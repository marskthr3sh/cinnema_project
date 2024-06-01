<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DichVu;
use App\Models\DonVi;
use Illuminate\Support\Facades\DB;
use App\Models\Phim;
use App\Models\Service;
use App\Models\userPhim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth1\Client\Server\Server;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('phim');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'dAccess denie');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Thông tin Không hợp lệ');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function index()
    {
        return view('admin.page.admin.index');
    }


    public function thongKe(Request $request)
    {

        $options      = Phim::all();
        $id_phim      = $request->input('id_phim');

        $khu_vuc      = $request->input('khu_vuc');
        $gio_bat_dau  = $request->input('gio_bat_dau');
        $gio_ket_thuc = $request->input('gio_ket_thuc');

        $results = [];

        if ($khu_vuc == '') {
            // if ($khu_vuc == '' && $id_phim) {

            // tìm tất cả rạp
            $results = UserPhim::select('phims.ten_phim',  DB::raw('SUM(user_phims.gia_tien) as tong_gia_tien'), DB::raw("'Tất Cả' AS rap_chieu"))
                ->leftJoin('phims', 'user_phims.id_phim', '=', 'phims.id')

                ->when($gio_bat_dau && $gio_ket_thuc, function ($query) use ($gio_bat_dau, $gio_ket_thuc) {
                    return $query->whereBetween('user_phims.updated_at', [$gio_bat_dau, $gio_ket_thuc]);
                })
                ->when($id_phim, function ($query, $id_phim) {
                    return $query->whereIn('user_phims.id_phim', $id_phim);
                })
                ->groupBy('phims.ten_phim')
                ->get();
        } else {
            $results = UserPhim::select('phims.ten_phim', 'user_phims.rap_chieu', DB::raw('SUM(user_phims.gia_tien) as tong_gia_tien'))
                ->leftJoin('phims', 'user_phims.id_phim', '=', 'phims.id')

                ->when($gio_bat_dau && $gio_ket_thuc, function ($query) use ($gio_bat_dau, $gio_ket_thuc) {
                    return $query->whereBetween('user_phims.updated_at', [$gio_bat_dau, $gio_ket_thuc]);
                })
                ->when($id_phim, function ($query, $id_phim) {
                    return $query->whereIn('user_phims.id_phim', $id_phim);
                })

                ->where('user_phims.rap_chieu', $khu_vuc)
                ->groupBy('phims.ten_phim', 'user_phims.rap_chieu')
                ->get();
        }
        return view('admin.page.thong_ke.thong_ke', [

            'khu_vuc'      => $khu_vuc,
            'gio_bat_dau'  => $gio_bat_dau,
            'gio_ket_thuc' => $gio_ket_thuc,
            'results'      => $results,
            'options'      => $options
        ]);
        // var_dump($results); exit;

    }
    public function ajaxthongKe(Request $request)
    {

        $options      = Phim::all();
        $id_phim      = $request->input('id_phim');

        $khu_vuc      = $request->input('khu_vuc');
        $gio_bat_dau  = $request->input('gio_bat_dau');
        $gio_ket_thuc = $request->input('gio_ket_thuc');

        $results = [];

        if ($khu_vuc == '') {
            // if ($khu_vuc == '' && $id_phim) {

            // tìm tất cả rạp
            $results = UserPhim::select('phims.ten_phim',  DB::raw('SUM(user_phims.gia_tien) as tong_gia_tien'), DB::raw("'Tất Cả' AS rap_chieu"))
                ->leftJoin('phims', 'user_phims.id_phim', '=', 'phims.id')

                ->when($gio_bat_dau && $gio_ket_thuc, function ($query) use ($gio_bat_dau, $gio_ket_thuc) {
                    return $query->whereBetween('user_phims.updated_at', [$gio_bat_dau, $gio_ket_thuc]);
                })
                ->when($id_phim, function ($query, $id_phim) {
                    return $query->whereIn('user_phims.id_phim', $id_phim);
                })
                ->groupBy('phims.ten_phim')
                ->get();
        } else {
            $results = UserPhim::select('phims.ten_phim', 'user_phims.rap_chieu', DB::raw('SUM(user_phims.gia_tien) as tong_gia_tien'))
                ->leftJoin('phims', 'user_phims.id_phim', '=', 'phims.id')

                ->when($gio_bat_dau && $gio_ket_thuc, function ($query) use ($gio_bat_dau, $gio_ket_thuc) {
                    return $query->whereBetween('user_phims.updated_at', [$gio_bat_dau, $gio_ket_thuc]);
                })
                ->when($id_phim, function ($query, $id_phim) {
                    return $query->whereIn('user_phims.id_phim', $id_phim);
                })

                ->where('user_phims.rap_chieu', $khu_vuc)
                ->groupBy('phims.ten_phim', 'user_phims.rap_chieu') // sap xep moi nhat
                ->orderBy('user_phims.updated_at', 'desc') // Sắp xếp theo thời gian
                ->get();
        }
        return response()->json([
            'found' => $results->isNotEmpty(),
            'gio_bat_dau'  => $gio_bat_dau,
            'gio_ket_thuc' => $gio_ket_thuc,
            'results'      => $results
        ]);
    }

    public function service()
    {
        $options      = DonVi::all();
        $services     = Service::orderBy('created_at', 'desc')->get();
        return view('admin.page.service_.service', [
            'services' => $services,
            'options'  => $options,
        ]);
    }

    public function postService(Request $request)
    {

        $ten_dich_vu    = $request->input('ten_dich_vu');
        $mo_ta          = $request->input('mo_ta');
        $hinh_anh       = $request->input('hinh_anh');
        $gia_ban        = $request->input('gia_ban');
        $tinh_trang     = $request->input('tinh_trang');
        $id_don_vi      = $request->input('id_don_vi');

        Service::create([
            'ten_dich_vu'        => $ten_dich_vu,
            'mo_ta'              => $mo_ta,
            'hinh_anh'           => $hinh_anh,
            'gia_ban'            => $gia_ban,
            'tinh_trang'         => $tinh_trang,
            'id_don_vi'          => $id_don_vi,
        ]);
        return redirect()->route('service');
    }
    public function delService($id)
    {
        $item = Service::findOrFail($id);
        $item->delete();

        return redirect()->route('service')->with('error', 'Xóa dịch vụ thành công');
    }

    public function editService($id){

        $edit  = Service::find($id);

        return view('admin.page.service_.service',['edit' => $edit]);

    }
     public function updateService(Request $request,string $id)
    {
        $validateDate = $request->validate([
            'ten_dich_vu'       => 'required',
            'hinh_anh'          => 'required',
            'gia_ban'           => 'required',
            'tinh_trang'        => 'required',
            'hinh_anh'          => 'required',
            'id_don_vi'         => 'required',
        ]);
        $update = Service::find($id);
        $update->update($validateDate);

        return redirect()->route('service')->with('success', 'Chỉnh sửa dịch vụ thành công');

    }
    public function statusService($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->tinh_trang = !$service->tinh_trang;
            $service->save();

            return response()->json([
                'success' => true,
                'new_status' => $service->tinh_trang ? 'Đang Kinh Doanh' : 'Dừng Kinh Doanh'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }
    }
}
