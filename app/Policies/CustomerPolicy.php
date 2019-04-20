<?php

namespace App\Policies;

use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Support\Facades\Auth;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function viewCustomer(User $user)
    {


        if($user->getGuard()=='admin')
        {
            return true;
        }
        return false;
    }
}
