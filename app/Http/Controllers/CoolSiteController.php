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
        // 渲染视图
        return view('cool.index', compact('coolSites'));
    }

    // 添加酷站
    public function create()
    {
        $data = [
            "user_id" => Auth::id(),
            "name" => "怪咖科学",
            "url" => "http://www.scienceswork.com",
            "description" => "怪客科学，一起分享生活中的美。",
            "img_url" => "cool/f795df5daf7a0ad010cd094c8bf0e435.png"
        ];
//        $cool = CoolSite::create($data);
//        dd($cool);
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
}
