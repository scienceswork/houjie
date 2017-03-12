<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\ReplyNews;
use Session;

class NewsController extends Controller
{
    // 使用中间件来限制页面访问规则
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'category'
        ]]);
    }

    // 发现首页
    public function index()
    {
        // 热门浏览
        $hots = News::getHotNews();
        // 获取所有分类
        $categories = Category::getAllCategories();
        // 获得所有文章
        $news = News::orderBy('id', 'desc')->paginate(15);
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
        // 查找该文章的所有评论
        $replies = ReplyNews::where('news_id', $id)->orderBy('id', 'desc')->get();
        return view('news.show', compact('news', 'views', 'lasts', 'pre_news', 'next_news', 'replies'));
    }

    // 发现分类
    public function category($slug)
    {
        // 查找分类
        $category = Category::where('slug', '=', $slug)->first();
        // 查找该分类下的所有文章
        $news = News::where('category_id', $category->id)->paginate(15);
        // 获取所有分类
        $categories = Category::getAllCategories();
        // 浏览排行前10
        $view_news = News::where('category_id', $category->id)->orderBy('view_count')->limit(10)->get();
        // 热议排行钱10
        $reply_news = News::where('category_id', $category->id)->orderBy('reply_count')->limit(10)->get();
        // 渲染视图
        return view('news.category', compact('category', 'news', 'categories', 'view_news', 'reply_news'));
    }

    public function reply(CreateReplyNewsRequest $request, $id)
    {
        // 创建评论
        $request->createReplyNews($id);
        // 设置闪存消息
        Session::flash('success', '恭喜你评论成功~');
        // 重定向路由
        return redirect()->route('web.news.show', $id);
    }
}
