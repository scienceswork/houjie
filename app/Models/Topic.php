<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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


    public function votes()
    {
        return $this->hasMany(VoteUpFeed::class);
    }
}
