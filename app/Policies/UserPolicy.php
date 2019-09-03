<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 验证用户只能编辑自己的资料
    // https://learnku.com/courses/laravel-essential-training/5.8/permissions-system/4098
    public function update (User $currentUser,User $user){
        return $currentUser->id === $user->id;
    }

    public function destroy (User $currentUser,User $user){
        // 通过is_admin字段为true 判断是否为管理员 并且 当前用户等于受验证用户（既管理员不能删除自己）
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
