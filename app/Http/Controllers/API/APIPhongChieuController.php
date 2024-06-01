<?php

namespace App\Http\Controllers\API;

use App\Models\PhongChieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIPhongChieuController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->all();

            PhongChieu::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phòng chiếu thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data()
    {
        $data   = PhongChieu::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $phong   = PhongChieu::find($request->id);
            if($phong) {
                if($phong->tinh_trang == 1) {
                    $phong->tinh_trang = 0;
                } else {
                    $phong->tinh_trang = 1;
                }
                $phong->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phòng không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function info(Request $request)
    {
        DB::beginTransaction();
        try {
            $phong   = PhongChieu::find($request->id);
            if($phong) {
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'data'      => $phong
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phòng không tồn tại!'
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

            $phong   = PhongChieu::find($request->id);
            if($phong) {
                $phong->delete();
                DB::commit();
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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $phong  = PhongChieu::find($request->id);
            if ($phong){
                $data = $request->all();
                $phong->update($data);
                DB::commit();
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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
}
