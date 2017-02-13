<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\MessageBag;

class UsersController extends Controller
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

    // 用户信息提交
    public function update(UpdateUserRequest $request, $id)
    {
        // 查找用户是否存在
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 使用try来检测数据是否正确修改
        try {
            $request->performUpdate($user);
            Session::flash('success', '用户信息修改成功');
        } catch (\Exception $exception) {
            Session::flash('errors', '用户信息修改失败，请稍后重试');
        }
        // 渲染视图
        return redirect()->route('web.users.edit', $id);
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
    public function updatePassword(ResetPasswordRequest $request, $id)
    {
        // 找到需要修改密码的账户
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 判断原密码是否相等
        if (!Hash::check($request->password, $user->password)) {
            // 原密码错误不允许修改
            return redirect()->route('web.users.edit_password', $id)->withErrors('原密码错误，请重新输入');
        }
        // 修改密码
        $user->password = bcrypt($request->new_password);
        // 保存
        $user->save();
        // 设置成功提醒消息
        Session::flash('success', '密码修改成功!');
        // 页面重定向
        return redirect()->route('web.users.edit_password', $id);
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

    // 修改头像提交
    public function updateAvatar(Request $request, $id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 捕捉异常
        try {
            if ($path = $request->file('avatar')->store('avatars')) {
                $user->avatar = $path;
                $user->save();
                Session::flash('success', '成功上传头像');
            } else {
                return redirect()->route('weu.users.edit_avatar', $id)->withErrors('头像上传失败，请重试');
            }
        } catch (\Exception $exception) {
            return redirect()->route('weu.users.edit_avatar', $id)->withErrors('头像上传失败，请重试');
        }
        return redirect()->route('web.users.edit_avatar', $id);
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
