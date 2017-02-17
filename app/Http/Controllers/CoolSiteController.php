<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoolSiteStoreRequest;
use App\Models\CoolSite;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Session;

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
        // 获取所有审核通过的酷站
        $coolSites = CoolSite::where('verified', true)->get();
        // 热门酷站
        $hots = CoolSite::orderBy('view', 'desc')->limit(10)->get();
        // 获取所有贡献者
        $coolUsers = CoolSite::getAllUser();
        // 渲染视图
        return view('cool.index', compact('coolSites', 'hots', 'coolUsers'));
    }

    // 添加酷站
    public function create()
    {
        return view('cool.create');
    }

    // 添加酷站提交
    public function store(CoolSiteStoreRequest $request)
    {
        // 捕捉异常
        try {
            $request->createCoolSite();
            Session::flash('success', '提交酷站申请成功，请留意邮件通知');
            // 创建酷站申请成功
            return redirect()->route('web.cool.create');
        } catch (\Exception $exception) {
            // 创建酷站申请失败
            return redirect()->route('web.cool.create')->withErrors('提交酷站申请失败，请稍后重试');
        }
    }

    // 酷站详细信息
    public function show($id)
    {
        // 查找酷站
        $coolSite = CoolSite::findOrFail($id);
        // 热门酷站
        $hots = CoolSite::orderBy('view', 'desc')->limit(10)->get();
        // 每次浏览酷站，浏览次数+1
        $coolSite->increment('view');
        return view('cool.show', compact('coolSite', 'hots'));
    }
}
