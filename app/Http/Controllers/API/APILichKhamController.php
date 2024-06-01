<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LichKham;
use Illuminate\Http\Request;

class APILichKhamController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        LichKham::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phòng khám thành công!'
        ]);
    }

    public function data()
    {
        $data   = LichKham::get();

        return response()->json([
            'bbb'    => $data,
        ]);
    }
    public function destroy(Request $request)
    {
        $lich_kham   = LichKham::find($request->id);
        if($lich_kham) {
            $lich_kham->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa phòng thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }
    public function update(Request $request) {

        $lich_kham  = LichKham::find($request->id);
        if ($lich_kham){
            $data = $request->all();
            $lich_kham->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }




}
