<?php

namespace App\Http\Controllers;

use App\Models\DonVi;
use Illuminate\Http\Request;

class DonViController extends Controller
{
    public function index()
    {
        return view('admin.page.don_vi.index');
    }
}
