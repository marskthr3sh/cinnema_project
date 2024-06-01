<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhongChieuController extends Controller
{
    public function index()
    {
        return view('admin.page.phong_chieu.index');
    }

    public function indexVue()
    {
        return view('admin.page.phong_chieu.index_vue');
    }
}
