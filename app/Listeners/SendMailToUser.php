<?php

namespace App\Listeners;

use App\Events\NewUserPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToUser implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NewUserPosted  $event
     * @return void
     */
    public function handle(NewUserPosted $event)
    {
        $body = "Thank you for using " . config('app.name') . '.';
        $body .= "\r\n\r\n";
        $body .= "Your job posting is under moderation.";
        $body .= "\r\n\r\n";
        $body .= "Best regards,";
        $body .= "\r\n";
        $body .= config('app.name') . " team.";

        Mail::raw($body, function ($message) use ($event){
            $message->to($event->job->user->email)
            ->subject('Post under moderation');
        });
    }
}
