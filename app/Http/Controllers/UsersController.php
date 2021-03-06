<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Jobs\SendActivateMail;
use App\Models\Article;
use App\Models\CategoryCommunity;
use App\Models\CoolSite;
use App\Models\Feed;
use App\Models\ReplyArticle;
use App\Models\VoteUpFeed;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Session;
use Auth;
use Cache;

class UsersController extends Controller
{
    // 使用中间件来限制页面访问规则
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'show', 'article', 'feed', 'voteFeed', 'cool'
        ]]);
    }
    // 用户展示页
    public function show($id)
    {
        // 查找某用户
        $user = User::findOrFail($id);
        // 查找所发的文章10篇
        $articles = Article::where('user_id', $id)->orderBy('id', 'desc')->limit(10)->get();
        // 最新发布的广场聊天10条
        $feeds = Feed::where('user_id', $id)->orderBy('id', 'desc')->limit(10)->get();
        // 社区评论10条
        $replies = ReplyArticle::where('user_id', $id)->orderBy('id', 'desc')->limit(10)->get();
        return view('users.show', compact('user', 'articles', 'feeds', 'replies'));
    }

    /**
     * 发布的文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 查找发布的所有文章
        $articles = Article::where('user_id', $id)->paginate(20);
        return view('users.article', compact('user', 'articles'));
    }

    /**
     * 发布的话题
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function feed($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 查找发布的话题
        $feeds = Feed::where('user_id', $id)->orderBy('id', 'desc')->paginate(20);
        // 渲染视图
        return view('users.feed', compact('user', 'feeds'));
    }

    /**
     * 赞过的话题
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function voteFeed($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 查找赞过的话题
        $votes = VoteUpFeed::where('user_id', $id)->orderBy('id', 'desc')->paginate(20);
        // 渲染视图
        return view('users.voteFeed', compact('user', 'votes'));
    }

    /**
     * 申请的酷站
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cool($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 发布的酷站
        $sites = CoolSite::where([
            ['user_id', $id],
            ['verified', true]
        ])->orderBy('id', 'desc')->paginate(20);
        // 渲染视图
        return view('users.site', compact('user', 'sites'));
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
    public function updateAvatar(UpdateAvatarRequest $request, $id)
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

    /**
     * 未验证邮箱跳转地址
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function emailVerificationRequired()
    {
        // 已经验证则跳转到首页
        if (\Auth::user()->verified) {
            return redirect()->intended('/');
        }
        // 未验证则跳转到验证通知
        return view('users.emailverificationrequired');
    }

    /**
     * 发送邮箱激活
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function sendVerificationMail()
    {
        // 获取当前的用户
        $user = Auth::user();
        // 设置缓存键名
        $cache_key = 'send_activite_mail_' . $user->id;
        // 判断缓存中键值
        if (Cache::has($cache_key)) {
            return redirect()->route('home')->withErrors('邮件发送失败，你执行此操作过于频繁，请于 60 秒后重试');
        } else {
            // 如果用户没有验证，则发送邮件，并且保存键值到缓存中
            if (!$user->verified) {
                // 发送邮件
                sendActivateMail($user);

//                $this->dispatch(new SendActivateMail($user));
                // 设置成功闪存消息
                Session::flash('success', '验证邮件发送成功！请注意查收哦 ^_^（邮件可能被识别为垃圾邮件，请注意查收哦 ）');
                // 成功发送后保存到缓存里，60秒内只能发送一次
                Cache::put($cache_key, time() + 60, 1);
            }
        }
        // 重定向路由
        return redirect()->route('home');
    }

    /**
     * 我的社区
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function community($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        // 检测是否有权限修改
        $this->authorize('update', $user);
        // 查找用户的所有帖子
        $articles = Article::where('user_id', $id)->orderBy('id', 'desc')->get();
        // 渲染视图
        return view('users.community', compact('articles', 'user'));
    }


    public function del($id)
    {
        // 查找文章
        $article = Article::findOrFail($id);
        // 判断是否有权限修改
        $this->authorize('update', $article);
        // 使用事务来删除
        try {
            // 使用事务来删除
            \DB::transaction(function () use ($id) {
                // 删除该数据
                $article = Article::find($id);
                // 删除评论
                ReplyArticle::where('article_id', $id)->delete();
                // 分类文章数-1
                $category = CategoryCommunity::find($article->category_id);
                // 减1
                $category->news_count--;
                $category->save();
                $article->delete();

            });
            // 删除成功
            Session::flash('success', '恭喜你删帖成功');
            return redirect()->route('web.users.community', Auth::id());
        } catch (\Exception $e) {
            // 删除失败
            return redirect()->route('web.users.community', Auth::id());
        }
    }
}
