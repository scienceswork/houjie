<?php

namespace App\Http\Controllers;

use App\Models\Express;
use Illuminate\Http\Request;
use App\Http\Requests\CreateExpressRequest;
use Session;

class ExpressController extends Controller
{
    // 鸿雁传情首页
    public function index()
    {
        // 查找所有展示的匿名情书
        $expressions = Express::where('is_show', true)->orderBy('id', 'desc')->get();
        // 渲染视图
        return view('express.index', compact('expressions'));
    }

    // 发布情书
    public function create(CreateExpressRequest $request)
    {
        $express = new Express();
        $express->receiver = $request['receiver'];
        $express->sender = $request['sender'];
        $express->content = $request['content'];
        $express->password = $request['password'];
        $express->is_show = $request['is_show'];
        $express->ip = $request->ip();
        $express->save();
        // 保存成功
        Session::flash('success', '发布情书成功，可在后街胡同搜索专属密码：' . $express->password . '，即可查看到情书');
        return redirect()->route('web.express.index');
    }

    // 情书密码搜索
    public function search(Request $request)
    {
        // 根据密码查找情书
        $express = Express::where('password', $request->password)->first();
        // 渲染视图
        return view('express.search', compact('express'));
    }

    // 验证密码
    public function validatePassword(Request $request)
    {
        if ($request->password == null) {
            return [
                'valid' => false
            ];
        }
        return Express::validatePassword($request->password);
    }
}
