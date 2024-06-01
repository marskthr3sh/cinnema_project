<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GheChieu;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\PhongChieu;
use App\Models\VeXemPhim;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class APILichChieuController extends Controller
{
    public function data(Request $request)
    {
        $data       =   LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
            ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
            ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong')
            ->get();

        $today      =   Carbon::today();

        $ds_phim    =   Phim::where('hien_thi', 1)
                            ->where('ket_thuc', '>', $today)
                            ->get();

        $ds_phong   =   PhongChieu::where('tinh_trang', 1)
                                  ->get();

        return response()->json([
            'data'      =>  $data,
            'ds_phim'   =>  $ds_phim,
            'ds_phong'  =>  $ds_phong,
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();

            LichChieu::create($data);

            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới lịch chiếu thành công!',
            ]);
        } catch (Exception $e) {
            Log::error("Ê, nó có lỗi đó tề: " . $e);
            DB::rollBack();
        }
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $lich_chieu     = LichChieu::find($request->id);
            if ($lich_chieu) {
                // Nếu lịch chiếu đang chuyển từ hoạt động  => tạm tắt
                if ($lich_chieu->trang_thai == 1) {
                    // Kiểm tra xem đã có vé nào bán hay chưa?
                    $check  = VeXemPhim::where('id_lich_chieu', $request->id)
                                       ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                                       ->first();
                    if($check) {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Lịch chiếu này đã bán vé cho khách rồi!',
                        ]);
                    }
                    // Phải hủy toàn bộ vé đã tạo ra
                    VeXemPhim::where('id_lich_chieu', $request->id)->delete();

                    $lich_chieu->trang_thai = 0;
                    $lich_chieu->save();

                    DB::commit();

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã hủy lịch chiếu phim!',
                    ]);
                } else {
                    $r_gbd      = $request->gio_bat_dau;
                    $r_gkt      = $request->gio_ket_thuc;
                    // a. Kiểm tra lịch chiếu có trùng không?   => Quên đi và ta chưa code
                    $check      =   LichChieu::where('trang_thai', 1)
                                             ->where('id_phong', $request->id_phong)
                                             ->where(function ($query) use ($request) {
                                                $query->where('gio_bat_dau', '>=', $request->gio_bat_dau)
                                                      ->where('gio_ket_thuc', '<=', $request->gio_ket_thuc);
                                                $query->orWhere('gio_bat_dau', '<=', $request->gio_bat_dau)
                                                      ->Where('gio_ket_thuc', '>=', $request->gio_bat_dau); 
                                                $query->orWhere('gio_bat_dau', '<=', $request->gio_ket_thuc)
                                                      ->Where('gio_ket_thuc', '>=', $request->gio_ket_thuc);
                                            })
                                            ->first();
                    if($check)  {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Phòng chiếu này đã có lịch chiếu!',
                        ]);
                    }
                    // b. Kiểm tra xem phòng chiếu này đã có ghế hay chưa?
                    $gheChieu   =   GheChieu::where('id_phong_chieu', $request->id_phong)->get();

                    if(count($gheChieu) == 0) {
                        return response()->json([
                            'status'    => 0,
                            'message'   => 'Phòng chiếu này không có ghế để bán!',
                        ]);
                    }
                    // c. Tạo ra danh sách ghế để bán. Ví dụ: Phòng 1 có 30 ghế thì ta sẽ tạo ra 30 ghế có thể bán cho lịch chiếu này. Nhưng ở ghế chiếu có trạng thái (0/1)	=> Chúng ta vẫn tạo đủ 30 ghế nhưng chúng ta chỉ bán những ghế có trạng thái = 1
                    foreach($gheChieu as $key => $value) {
                        VeXemPhim::create([
                            'id_lich_chieu'     =>  $request->id,   // Lịch mà ta đang đổi trạng thái
                            'so_ghe'            =>  $value->ten_ghe,
                            'ma_ve'             =>  Str::uuid(),    // sinh ra 1 đoạn mã random 36 ký tự không trùng
                            'gia_ve'            =>  $value->gia_mac_dinh,
                            'tinh_trang'        =>  $value->tinh_trang == 0 ? \App\Models\VeXemPhim::VE_KHONG_THE_BAN : \App\Models\VeXemPhim::VE_CO_THE_BAN,
                        ]);
                    }

                    $lich_chieu->trang_thai = 1;
                    $lich_chieu->save();

                    DB::commit();

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã kích hoạt lịch chiếu phim!',
                    ]);
                }
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Lịch chiếu không tồn tại!',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $lichChieu   = LichChieu::find($request->id);
            if ($lichChieu) {
                $data   = $request->all();
                $lichChieu->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Lịch chiếu không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $lichChieu     =   LichChieu::find($request->id);

            if ($lichChieu) {
                // Kiểm tra xem đã có vé nào bán hay chưa?
                $check  = VeXemPhim::where('id_lich_chieu', $request->id)
                                   ->where('tinh_trang', \App\Models\VeXemPhim::VE_DA_BAN)
                                   ->first();
                if($check) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Lịch chiếu này đã bán vé cho khách rồi!',
                    ]);
                }
                // Phải hủy toàn bộ vé đã tạo ra
                VeXemPhim::where('id_lich_chieu', $request->id)->delete();

                $lichChieu->delete();

                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa lịch chiếu thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'lịch chiếu không tồn tại!',
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
