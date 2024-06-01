<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanhSachTaiKhoanController extends Controller
{
    public function index(){
        return view('admin.page.list_tai_khoan.index');
    }

    public function indexVue(){
        return view('admin.page.list_tai_khoan.index_vue');
    }
}
