<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DanhSachTaiKhoanController extends Controller
{
    public function user()
    {
        $users     = User::orderBy('created_at', 'desc')->get();
        return view('admin.page.list_tai_khoan.index', [
            'users' => $users,
        ]);
    }
    public function updateUser(Request $request, string $id){

        $user = User::find($id);
        $user->is_admin = $request->input('is_admin');
        $user->save();
        return redirect()->route('user')->with('success', 'Cập nhật quyền thành công');

    }
}
