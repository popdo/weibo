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
}
