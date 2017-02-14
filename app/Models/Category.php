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
}
