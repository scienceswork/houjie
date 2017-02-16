<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    // 表名
    protected $table = 'signs';
    // 取消自动维护时间戳
    public $timestamps = false;

    public static function getSign($id)
    {
        $count = Sign::where('user_id', $id)->count();
        return $count;
    }
}
