<?php

namespace App\Policies;

use App\User;
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
    public function edit(User $user,User $user1){
        return $user->id===$user1->id || $user->is_admin;
    }

    public function isAdmin(User $user){
        return $user->is_admin;
    }
}
