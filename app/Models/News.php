<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    // 一篇新闻仅只有一个分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
