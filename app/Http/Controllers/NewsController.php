<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // 发现首页
    public function index()
    {
        // 热门浏览
        $hots = News::orderBy('view_count', 'desc')->limit(10)->get();
        // 获取所有分类
        $categories = Category::orderBy('order', 'asc')->get();
        // 获得所有文章
        $news = News::orderBy('id', 'desc')->paginate(10);;
        // 渲染视图
        return view('news.index', compact('hots', 'categories', 'news'));
    }

    // 发现文章展示
    public function show($id)
    {
        // 根据新闻id查找新闻
        $news = News::findOrFail($id);
        // 浏览次数+1
        $news->increment('view_count');
        // 查找该分类下的热门浏览文章10篇
        $views = News::where('category_id', $news->category_id)
            ->orderBy('view_count', 'desc')
            ->limit(10)
            ->get();
        // 查找该分类下的最新报道文章10篇
        $lasts = News::orderBy('id', 'desc')->limit(10)->get();
        // 查找上一篇
        $pre_news = News::where('id', '<', $news->id)->orderBy('id', 'desc')->first();
        // 查找下一篇
        $next_news = News::where('id', '>', $news->id)->orderBy('id', 'asc')->first();
        return view('news.show', compact('news', 'views', 'lasts', 'pre_news', 'next_news'));
    }

    // 发现分类
    public function category($slug)
    {
        // 查找分类
        $category = Category::where('slug', '=', $slug)->first();
        // 渲染视图
        return view('news.category', compact('category'));
    }
}
