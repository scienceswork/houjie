<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class CoolSite extends Model
{
    protected $table = 'cool_sites';
    // 不可被批量赋值的字段
    protected $guarded = [];

    /**
     * 获取一个酷站申请的所有者
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 取出所有的酷站贡献者
     * @return array
     */
    public static function getAllUser()
    {
        $users = Cache::remember('houjie_cool_user', 1440, function () {
            return self::select('user_id')->distinct('user_id')->get();
        });
        return $users;
    }
}
