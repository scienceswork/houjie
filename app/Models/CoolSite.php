<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
