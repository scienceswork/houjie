<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Express extends Model
{
    protected $table = 'expressions';

    // 验证密码是否唯一
    public static function validatePassword($password)
    {
        // 查找数据库是否存在此密码
        if (self::where('password', $password)->count()) {
            return ['valid' => false];
        } else {
            return ['valid' => true];
        }
    }
}
