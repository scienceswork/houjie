<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedRequest;
use App\Http\Requests\CreateReplyFeedRequest;
use App\Http\Requests\CreateVoteUpFeedRequest;
use App\Models\Feed;
use Session;
use Auth;
use DB;

class FeedController extends Controller
{
    /**
     * 广场聊天首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // 查找所有说说
        $feeds = Feed::allFeeds();
        // 精品说说，点赞最高的10条
        $vote_feeds = Feed::orderBy('vote_up_count', 'desc')->limit(10)->get();
        // 热门说说，评论最多的10条
        $hot_feeds = Feed::orderBy('rep_count', 'desc')->orderBy('id', 'desc')->limit(10)->get();
        return view('feed.index', compact('feeds', 'vote_feeds', 'hot_feeds'));
    }

    /**
     * 创建聊天提交
     * @param CreateFeedRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFeedRequest $request)
    {
        // 创建说说
        $request->createFeed();
        // 设置成功消息
        Session::flash('success', '恭喜你，发布说说成功~');
        // 重定向URL
        return redirect()->route('web.feed.index');
    }

    /**
     * 点赞
     * @param \Request $request
     * @return \Request
     */
    public function vote(CreateVoteUpFeedRequest $request)
    {
        // 判断是否登录
        if (!Auth::check()) {
            $data = [
                'status' => -1,
                'message' => '未登录',
            ];
        } else {
            // 创建在线
            $voteUpFeed = $request->createVoteUpFeed();
            $data = [
                'status' => 1,
                'message' => '点赞成功',
                'vote' => $voteUpFeed,
            ];
        }
        return $data;
    }

    /**
     * 回复
     * @param CreateReplyFeedRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(CreateReplyFeedRequest $request)
    {
        // 创建回复
        $request->createReplyFeed();
        // 设置成功回复消息
        Session::flash('success', '恭喜你，回复消息成功');
        // 重定向路由
        return redirect()->route('web.feed.index');
    }
}
