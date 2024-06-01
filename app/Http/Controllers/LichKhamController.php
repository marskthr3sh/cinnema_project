<?php

namespace App\Http\Controllers;

use App\Models\LichKham;
use Illuminate\Http\Request;

class LichKhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.lich_kham.index');
    }

}
