<?php

namespace App\Listeners;

use App\Events\JobCreated;
use App\Events\NewUserPosted;

class CheckIfNewUser
{

    /**
     * Handle the event.
     *
     * @param  JobCreated  $event
     * @return void
     */
    public function handle(JobCreated $event)
    {
        $user = $event->job->user;

        // since new users can do one post
        // their approval starts at null
        if ($user->approved !== NULL) {
            return false;
        }

        // after the first post
        // they need to wait for moderation
        // to post more
        $user->approved = false;
        $user->save();

        event(new NewUserPosted($event->job));
    }
}
