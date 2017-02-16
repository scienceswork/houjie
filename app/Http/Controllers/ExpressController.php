<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpressController extends Controller
{
    // 鸿雁传情首页
    public function index()
    {
        return view('express.index');
    }
}
