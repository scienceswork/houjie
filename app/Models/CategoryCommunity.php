<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class CategoryCommunity extends Model
{
    // 使用ModelTree和AdminBuilder组件
    use ModelTree, AdminBuilder;
    // 表名
    protected $table = 'category_community';
    // 不可被批量赋值的字段
    protected $guarded = [];
}
