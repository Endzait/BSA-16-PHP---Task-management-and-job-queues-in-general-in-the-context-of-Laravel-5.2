<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
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

    public function change(User $user){
    return  $user->is_admin;
}
    public function getPass(User $user){
        return $user->is_admin;

    }
    public function any(User $user){
        return $user->is_admin;
    }

    public function delete(User $user){
        return $user->is_admin;
    }

}
