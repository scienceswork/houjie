<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyTopicRequest;
use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\CreateTopicRequest;
use App\Models\ReplyTopic;
use App\Models\Teacher;
use App\Models\Topic;
use Session;

class TeacherController extends Controller
{
    /**
     * 教师在线控制器中间件
     * TeacherController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'topicShow'
        ]]);
    }

    /**
     * 教师在线首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 查找所有通过审核并且没有被封禁的教师在线
        $teachers = Teacher::where([['is_pass', true], ['is_close', false]])->get();
        // 查找热门教师在线10个
        $hot_teachers = Teacher::where([['is_pass', true], ['is_close', false]])
            ->orderBy('articles_count', 'desc')
            ->limit(10)
            ->get();
        // 渲染模板
        return view('teacher.index', compact('teachers', 'hot_teachers'));
    }

    /**
     * 创建教师在线
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('teacher.create');
    }


    public function show($id)
    {
        // 查找专属的教师分类，且未封禁
        $teacher = Teacher::where([
            ['id', $id],
            ['is_pass', true],
            ['is_close', false]
        ])->first();
        // 查找该教师在线分类下所有的帖子
        $topics = Topic::where([['teacher_id', $id], ['is_close', false]])
            ->orderBy('id', 'desc')
            ->paginate(10);
        // 查找热门帖子
        $hot_topics = Topic::where([['teacher_id', $id], ['is_close', false]])
            ->orderBy('rep_count', 'desc')
            ->limit(10)
            ->get();
        // 在线热议榜
        $hots = Topic::where('is_close', false)
            ->orderBy('rep_count', 'desc')
            ->limit(10)
            ->get();
        // 渲染视图
        return view('teacher.show', compact('teacher', 'topics', 'hot_topics', 'hots'));
    }

    /**
     * 创建教师在线提交
     * @param CreateTeacherRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTeacherRequest $request)
    {
        // 创建在线
        $teacher = $request->createTeacher();
        // 提交Flash消息
        Session::flash('success', '提交在线申请成功，请留意邮件/电话通知');
        // 重写路由
        return redirect()->route('web.teacher.index');
    }

    /**
     * 发帖
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createTopic($id)
    {
        // 查找相应的教师在线
        $teacher = Teacher::findOrFail($id);
        // 渲染视图
        return view('teacher.createTopic', compact('teacher'));
    }

    /**
     * 帖子展示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function topicShow($id)
    {
        // 查找帖子
        $topic = Topic::findOrFail($id);
        // 查找帖子的分类
        $teacher = Teacher::findOrFail($topic->teacher_id);
        // 获取帖子的所有回复
        $replies = ReplyTopic::where('topic_id', $id)->get();
        // 查找热门帖子
        $hot_topics = Topic::where([['teacher_id', $topic->teacher_id], ['is_close', false]])
            ->orderBy('rep_count', 'desc')
            ->limit(10)
            ->get();
        // 在线热议榜
        $hots = Topic::where('is_close', false)
            ->orderBy('rep_count', 'desc')
            ->limit(10)
            ->get();
        // 渲染视图
        return view('teacher.topicShow', compact('teacher', 'topic', 'replies', 'hot_topics', 'hots'));
    }


    public function topicReplyStore(CreateReplyTopicRequest $request, $id)
    {
        // 创建回复
        $request->createReply($id);
        // 设置成功返回信息
        Session::flash('success', '恭喜您，回复成功~');
        // 重定向路由
        return redirect()->route('web.teacher.topicShow', $id);
    }
    
    public function topicStore(CreateTopicRequest $request, $id)
    {
        // 创建发帖
        $topic = $request->createTopic($id);
        // 创建成功后+1
        $teacher = Teacher::findOrFail($topic->teacher_id);
        $teacher->increment('articles_count');
        // 设置发帖成功Flash消息
        Session::flash('success', '恭喜你，发帖成功~');
        // 重定向路由
        return redirect()->route('web.teacher.show', $id);
    }
}
