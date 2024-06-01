<?php

namespace App\Http\Controllers;

use App\Models\LichChieu;
use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function index()
    {
        return view('admin.page.lich_chieu.index');
    }
}
