<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIHomepageController extends Controller
{
    public function getDataHome()
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->get();

        $phimSapChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '>', $today)
                              ->get();

        return response()->json([
            'phimDangChieu' => $phimDangChieu,
            'phimSapChieu'  => $phimSapChieu,
        ]);
    }

    public function getDataFilmDetail(Request $request)
    {

    }
}
