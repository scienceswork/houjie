<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 表名
    protected $table = 'articles';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 一篇文章只能属于一个用户
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 一篇文章只能有一个分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryCommunity::class, 'category_id');
    }
}
