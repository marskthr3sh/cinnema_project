<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use App\Models\DonVi;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function index()
    {
        $don_vi = DonVi::get();
        return view('admin.page.dich_vu.index', compact('don_vi'));
    }
}
