<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // 表名
    protected $table = 'links';
    // 不可被批量赋值的字段
    protected $guarded = [];
}
