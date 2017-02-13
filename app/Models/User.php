<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
