<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class APISinhVienController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        SinhVien::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới sinh viên thành công!'
        ]);
    }

    public function data()
    {
        $data   = SinhVien::get();

        return response()->json([
            'bbb'    => $data,
        ]);
    }
    public function destroy(Request $request)
    {
        $sinh_vien   = SinhVien::find($request->id);
        if($sinh_vien) {
            $sinh_vien->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa sv thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'sv không tồn tại!'
            ]);
        }
    }
    public function update(Request $request) {

        $sinh_vien  = SinhVien::find($request->id);
        if ($sinh_vien){
            $data = $request->all();
            $sinh_vien->update($data);
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
