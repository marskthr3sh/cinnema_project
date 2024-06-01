<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SlideController;
use App\Models\slide;
use Illuminate\Http\Request;

class APISlideController extends Controller
{
    public function data(Request $request)
    {
        $data = slide::get();

        return response()->json([
            'status'    => 1,
            'data'   => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        slide::create($data);

        return response()->json([
            'status'    => 1,   
            'message'   => 'Đã thêm mới thành công',
        ]);
    }
}
