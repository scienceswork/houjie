<?php

namespace App\Http\Controllers;

use App\Models\CoolSite;
use Illuminate\Http\Request;

class CoolSiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index'
        ]]);
    }

    // 酷站展示
    public function index()
    {
        // 获取所有酷站
        $coolSites = CoolSite::all();
        // 渲染视图
        return view('cool.index');
    }

    // 添加酷站
    public function create()
    {
        return view('cool.create');
    }
}
