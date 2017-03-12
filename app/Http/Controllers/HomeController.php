<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Link;
use App\Models\News;
use App\Models\Topic;
use App\Models\User;
use Jrean\UserVerification\Facades\UserVerification;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查找聊天广场20条说说
        $feeds = Feed::orderBy('id', 'desc')->limit(20)->get();
        // 查找最新的在线10条
        $topics = Topic::orderBy('id', 'desc')->limit(10)->get();
        // 查找10大浏览最高的新闻
        $news = News::orderBy('view_count', 'desc')->limit(10)->get();
        // 最新注册的10个用户
        $users = User::orderBy('id', 'desc')->limit(10)->get();
        // 获取友情链接
        $links = Link::getAllLinks();
        // 查找最新的动态10条
        $new_news = News::orderBy('id', 'desc')->limit(10)->get();
        // 渲染视图
        return view('home', compact('feeds', 'topics', 'news', 'users', 'links', 'new_news'));
    }
}
