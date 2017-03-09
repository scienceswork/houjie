<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteUpFeed extends Model
{
    // 表名
    protected $table = 'vote_up_feeds';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一条说说只能属于一个用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
