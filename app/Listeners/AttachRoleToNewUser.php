<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Role;

class AttachRoleToNewUser
{

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $user = $event->user;
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role);
    }
}
