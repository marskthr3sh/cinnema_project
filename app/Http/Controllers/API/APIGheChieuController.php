<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GheChieu;
use App\Models\PhongChieu;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIGheChieuController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            GheChieu::where('id_phong_chieu', $request->id)->delete();
            DB::commit();

            for($i = 0; $i < $request->hang_doc; $i++) {
                for($j = 0; $j < $request->hang_ngang; $j++) {
                    if($j < 9) {
                        $ten_ghe = chr($i + 65) . '0' . ($j + 1);
                    } else {
                        $ten_ghe = chr($i + 65) . ($j + 1);
                    }

                    GheChieu::create([
                        'tinh_trang'		=> 	1,
                        'gia_mac_dinh'		=>  $request->gia_mac_dinh,
                        'id_phong_chieu'	=>	$request->id,
                        'ten_ghe'			=>	$ten_ghe,
                    ]);
                }
            }
            DB::commit();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã tạo ra tổng cộng ' . $request->hang_ngang * $request->hang_doc . ' ghế!',
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function infoPhongGhe(Request $request)
    {
        DB::beginTransaction();
        try {

            $phong      = PhongChieu::find($request->id_phong);
            $ds_ghe     = GheChieu::where('id_phong_chieu', $request->id_phong)->get(); // Trả về 1 array
            DB::commit();

            return response()->json([
                'phong_chieu'   =>  $phong,
                'ds_ghe'        =>  $ds_ghe,
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function status(Request $request)
    {
        DB::beginTransaction();

        try {
            $gheChieu   = GheChieu::find($request->id);
            if($gheChieu) {
                $gheChieu->tinh_trang   = !$gheChieu->tinh_trang;
                $gheChieu->save();

                DB::commit();

                return response()-> json([
                    'status'    => 1,
                    'message'   => 'Đã đổi trạng thái ghế!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Ghế chiếu không tồn tại!',
                ]);
            }

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $gheChieu     =   GheChieu::find($request->id);
            if($gheChieu) {
                $data   = $request->all();
                $gheChieu->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật ghế chiếu thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Ghế chiếu không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
