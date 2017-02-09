<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // 使用中间件来限制页面反问规则
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'show'
        ]]);
    }
    // 用户展示页
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // 用户信息编辑
    public function edit($id)
    {
        return view('users.edit');
    }

    // 修改密码
    public function editPassword($id)
    {
        // 查找到需要修改的user
        $user = User::findOrFail($id);
//        $this->authorize('update', $user);

        return view('users.editPassword', compact('user'));
    }
    
    // 修改邮件通知
    public function editEmailNotify($id)
    {
        return view('users.editEmailNotify');
    }
}
