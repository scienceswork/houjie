<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function view(User $currentUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * 用户表更新规则过滤，除了管理员和自身不能修改
     * @param  \App\Models\User $currentUser
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id == $user->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\Models\User $currentUser
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function delete(User $currentUser, User $user)
    {
        //
    }
}
