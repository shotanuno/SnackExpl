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
    
    public function isAdmin(User $user) {
          $admin = config('app.admin');
          return in_array($user->id, $admin);
     }

     public function before(User $user, $ability) {
          if ($this->isAdmin($user)) {
               return true;
          }
     }
    
    public function __construct()
    {
        //
    }
}
