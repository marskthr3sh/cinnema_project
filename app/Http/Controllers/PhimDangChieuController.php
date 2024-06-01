<?php

namespace App\Http\Controllers;
use App\Models\Phim;
use Carbon\Carbon;
use App\Models\PhimDangChieu;
use Illuminate\Http\Request;

class PhimDangChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function danhSachPhim($id)
    {
        $phimDangChieu  = Phim::where('hien_thi' , $id)
                              ->get();
                            //   var_dump($phimDangChieu);
        return view('client.page.phim_dang_chieu.index', compact('phimDangChieu'));

    }



}
