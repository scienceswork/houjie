<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // 表名
    protected $table = 'teachers';

    // 不可批量赋值的字段为空
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
