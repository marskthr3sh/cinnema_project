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
    public function editUser($id){

        $edit  = User::find($id);

        return view('admin.page.list_tai_khoan.index',['edit' => $edit]);

    }
    public function updateUser(Request $request,string $id){
        $validateDate = $request->validate([
            'is_admin'       => 'required',
        ]);
        $update = User::find($id);
        $update->update($validateDate);
        return redirect()->route('user')->with('success', 'Chỉnh sửa dịch vụ thành công');

    }
}
