<?php

namespace App\Http\Controllers;

use App\Models\CoolSite;
use Illuminate\Http\Request;

class CoolSiteController extends Controller
{
    // 酷站展示
    public function index()
    {
        // 获取所有酷站
        $coolSites = CoolSite::all();
        // 渲染视图
        return view('cool.index');
    }
}
