<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyArticle extends Model
{
    // 表名
    protected $table = 'reply_articles';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一条评论只能属于一个用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
