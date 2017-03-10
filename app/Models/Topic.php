<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Topic extends Model
{
    // 定义表名
    protected $table = 'topics';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 设置一对多模型，一个用户可以有多个帖子，但是一个帖子只能属于一个用户
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 最后一个回复的用户，一条帖子只能有一个最后回复的用户
     * @return mixed
     */
    public function lastReplyUser()
    {
        return $this->belongsTo(User::class, 'last_rep_user');
    }

    /**
     * 一条帖子可以对应多条评论
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(VoteUpFeed::class);
    }

    public static function allTopicCount()
    {
        // 缓存时间约为60分钟，每30分钟更新一次用户总数
        return Cache::remember('houjie_all_topic_count', 30, function () {
            return self::all()->count();
        });
    }
}
