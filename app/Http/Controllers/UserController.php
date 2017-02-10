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
        // 查找用户是否存在
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 渲染视图
        return view('users.edit', compact('user'));
    }

    // 修改密码（显示页面）
    public function editPassword($id)
    {
        // 查找到需要修改的user
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        return view('users.editPassword', compact('user'));
    }

    // 提交密码修改
    public function updatePassword()
    {
        
    }

    // 修改头像
    public function editAvatar($id)
    {
        // 查找用户是否存在
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 渲染视图
        return view('users.editAvatar', compact('user'));
    }
    
    // 修改邮件通知
    public function editEmailNotify($id)
    {
        // 查找用户是否存在
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 渲染视图
        return view('users.editEmailNotify', compact('user'));
    }
}
