<?php

namespace App\Http\Controllers\API;
use App\Models\Phim;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIPhimDangChieuController extends Controller
{
    public function getDataHome()
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->get();

        // $phimSapChieu  = Phim::where('hien_thi', 1)
        //                       ->whereDate('bat_dau', '>', $today)
        //                       ->get();

        return response()->json([
            'phimDangChieu' => $phimDangChieu,
            // 'phimSapChieu'  => $phimSapChieu,
        ]);
    }
}
