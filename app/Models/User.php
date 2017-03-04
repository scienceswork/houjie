<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar',
        'school', 'student_id', 'sex', 'real_name', 'introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取某个用户下的所有酷站申请
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cool_sites()
    {
        return $this->hasMany(CoolSite::class);
    }

    /**
     * 返回所有用户数，使用redis缓存，时间为30分钟
     * @return int
     */
    public static function allUserCount()
    {
        // 缓存时间约为60分钟，每30分钟更新一次用户总数
        return Cache::remember('houjie_all_user_count', 30, function () {
            return self::all()->count();
        });
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
