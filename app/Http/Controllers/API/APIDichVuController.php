<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIDichVuController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $data   = $request->all();

            DichVu::create($data);
            DB::commit();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã thêm mới dịch vụ thành công!',
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data(Request $request)
    {
        $data   = DichVu::all();

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $dichVu     =   DichVu::find($request->id);

            if($dichVu) {
                $dichVu->delete();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
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

            $dichVu     =   DichVu::find($request->id);
            if($dichVu) {
                $data   = $request->all();
                $dichVu->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {
            $dichVu     =   DichVu::find($request->id);
            if($dichVu) {
                $dichVu->tinh_trang     =   $dichVu->tinh_trang == 1 ? 0 : 1;
                $dichVu->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật dịch vụ thành công!',
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Dịch vụ không tồn tại!',
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
