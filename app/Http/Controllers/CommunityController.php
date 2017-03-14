<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\CreateReplyArticleRequest;
use App\Models\Article;
use App\Models\CategoryCommunity;
use App\Models\Link;
use App\Models\ReplyArticle;
use Session;

class CommunityController extends Controller
{
    // 使用中间件来限制页面访问规则
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'category'
        ]]);
    }
    /**
     * 社区首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 查找所有的帖子
        $articles = Article::orderBy('id', 'desc')->paginate(20);
        // 热门话题，评论最高的前10条
        $hotArticles = Article::orderBy('rep_count', 'desc')->limit(10)->get();
        // 查找所有友情链接
        $links = Link::getAllLinks();
        // 查找所有分类
        $categories = CategoryCommunity::all();
        // 渲染视图
        return view('community.index', compact('articles', 'hotArticles', 'links', 'categories'));
    }

    /**
     * 创建帖子
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // 查找所有分类
        $categories = CategoryCommunity::all();
        return view('community.create', compact('categories'));
    }

    /**
     * 帖子提交
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateArticleRequest $request)
    {
        // 创建帖子
        $request->createArticle();
        // 设置创建成功闪存
        Session::flash('success', '恭喜你发帖成功~');
        // 重定向路由
        return redirect()->route('web.community.index');
    }

    /**
     * 展示文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        // 查找对应的文章
        $article = Article::findOrFail($id);
        // 浏览次数+1
        $article->increment('view_count');
        // 查找所有评论
        $replies = ReplyArticle::where('article_id', $id)->get();
        // 渲染视图
        return view('community.show', compact('article', 'replies'));
    }

    /**
     * 提交评论
     * @param CreateReplyArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyStore(CreateReplyArticleRequest $request, $id)
    {
        // 创建评论
        $request->createReplyArticle($id);
        // 设置成功消息
        Session::flash('success', '恭喜你评论成功~');
        // 重定向路由
        return redirect()->route('web.community.show', $id);
    }

    /**
     * 分类
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($id)
    {
        // 查找分类
        $category = CategoryCommunity::findOrFail($id);
        // 查找分类下的文章
        $articles = Article::where('category_id', $id)->orderBy('id', 'desc')->paginate(20);
        // 热门话题，评论最高的前10条
        $hotArticles = Article::where('category_id', $id)->orderBy('rep_count', 'desc')->limit(10)->get();
        // 查找所有友情链接
        $links = Link::getAllLinks();
        // 查找所有分类
        $categories = CategoryCommunity::all();
        return view('community.category', compact('category', 'articles', 'hotArticles', 'links', 'categories'));
    }
}
