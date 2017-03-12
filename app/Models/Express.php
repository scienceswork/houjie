<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

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

    /**
     * 获取表白总数，缓存时间为30分钟
     * @return mixed
     */
    public static function allExpressCount()
    {
//        return Cache::remember('houjie_all_express_count', 30, function () {
            return self::all()->count();
//        });
    }
}
