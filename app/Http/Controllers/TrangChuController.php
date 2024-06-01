<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

use App\Models\DichVu;
use App\Models\Phim;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function home()
    {
        return view('client.page.home');
    }

    public function phimChieu($id)
    {
        $phimChieu  = Phim::where('trang_thai', $id)
                            ->get();
        if($phimChieu){
            return view('client.page.phim_dang_chieu.phim_chieu', [
                'listphim' => $phimChieu,
                'loaiPhim'=> $id

            ]);
        }else{
            return view('admin.page.phim.found');
        }

    }

    public function timKiem(Request $request)
    {

        // $date    = $request->input('timkiemngay');

        $timkiem = $request->input('timkiemthongtin');

        $results = [];


        // $results = Phim::where('bat_dau', '=', $date)
        //                 ->where('ten_phim', 'like', '%' . $timkiem . '%')
        //                 ->get();
        $results = Phim::where('ten_phim', 'like', '%' . $timkiem . '%')
                        // ->where('ten_phim', 'like', '%' . $timkiem . '%')
                        ->get();
        //    echo ($date);exit;
        // var_dump($results);exit;

        return view('client.page.search', ['results' => $results]);

    }

    public function detailPhim($id)
    {
        $phim           = Phim::find($id);

        if($phim){
            return view('client.page.film_detail', [
                'phim' => $phim
            ]);
        }else{
           return view('admin.page.phim.found');
        }

    }


}
