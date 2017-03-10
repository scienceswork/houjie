<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查找聊天广场20条说说
        $feeds = Feed::orderBy('id', 'desc')->limit(20)->get();
        // 渲染视图
        return view('home', compact('feeds'));
    }
}
