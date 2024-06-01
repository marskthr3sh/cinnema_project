<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        return view('admin.page.slide.index');
    }
}
