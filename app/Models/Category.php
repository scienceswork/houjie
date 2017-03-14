<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    // 使用ModelTree和AdminBuilder组件
    use ModelTree, AdminBuilder;
    protected $table = 'categories';

    // 一个分类下有多篇新闻
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // 获取所有分类，缓存时间约为60分钟
    public static function getAllCategories()
    {
//        $data = Cache::remember('houjie_all_categories', 60, function () {
            return self::orderBy('order', 'asc')->get();
//        });

//        return $data;
    }
}
