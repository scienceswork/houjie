<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyTopic extends Model
{
    // 设置表名
    protected $table = 'reply_topics';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一条回复对应一个用户，一个用户可以有多条回复
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 一条评论只能属于一个帖子
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
