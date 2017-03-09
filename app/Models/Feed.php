<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Feed extends Model
{
    // 表名
    protected $table = 'feeds';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一条说说只能属于一个用户
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function allFeeds()
    {
        $feeds = self::orderBy('id', 'desc')->paginate(15);;
        // 组装
        foreach ($feeds as &$feed) {
            // 组装点赞
            $votes = DB::table('vote_up_feeds')
                ->where('feed_id', $feed['id'])
                ->orderBy('id', 'desc')
                ->join('users', 'vote_up_feeds.user_id', '=', 'users.id')
                ->select('vote_up_feeds.*', 'users.name')
                ->get()
                ->toArray();
            // 组装留言
            $replies = DB::table('reply_feeds')
                ->where('feed_id', $feed['id'])
                ->join('users', 'reply_feeds.user_id', '=', 'users.id')
                ->select('reply_feeds.*', 'users.name', 'users.avatar')
                ->get()
                ->toArray();
            $feed['votes'] = $votes;
            $feed['replies'] = $replies;
        }
//        dd($feeds);
        return $feeds;
    }
}
