<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyFeed extends Model
{
    // 表名
    protected $table = 'reply_feeds';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一条评论只能属于一个用户
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
