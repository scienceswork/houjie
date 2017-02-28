<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class News extends Model
{
    protected $table = 'news';

    // 一篇新闻仅只有一个分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 获取热门浏览文章，缓存时间为10分钟
    public static function getHotNews()
    {
        $data = Cache::remember('houjie_hot_news', 10, function () {
            return self::orderBy('view_count', 'desc')->limit(10)->get();
        });
        return $data;
    }

    /**
     * 获得所有新闻的数量，缓存时间为30分钟
     * @return mixed
     */
    public static function allNewsCount()
    {
        return Cache::remember('houjie_all_news_count', 30, function () {
            return self::all()->count();
        });
    }
}
