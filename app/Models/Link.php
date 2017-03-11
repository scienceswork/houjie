<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Cache;

class Link extends Model implements Sortable
{
    // 表名
    protected $table = 'links';
    // 不可被批量赋值的字段
    protected $guarded = [];
    // 使用Trait
    use SortableTrait, AdminBuilder;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    /**
     * 获取所有友情链接
     * @return mixed
     */
    public static function getAllLinks()
    {
        // 使用缓存
        $links = Cache::remember('houjie_all_links', 60, function () {
            // 获取所有正常的友情链接
            return self::where('is_closed', false)->orderBy('order', 'asc')->get();
        });
        // 返回数据
        return $links;
    }
}
