<?php

namespace App\Listeners;

use App\Events\NewUserPosted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Role;

class SendMailToAdmin implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NewUserPosted  $event
     * @return void
     */
    public function handle(NewUserPosted $event)
    {
        $body = $event->job->title;
        $body .= "\r\n\r\n";
        $body .= $event->job->description;
        $body .= "\r\n\r\n";
        $body .= "To approve this post please follow:";
        $body .= "\r\n";
        $body .= URL::signedRoute('mailLinks.approve', ['user' => $event->job->user->id]);
        $body .= "\r\n\r\n";
        $body .= "If you think that this is spam please follow:";
        $body .= "\r\n";
        $body .= URL::signedRoute('mailLinks.trash', ['user' => $event->job->user->id]);

        // get emails of all admins
        $ccs = Role::where('name', 'admin')->first()
            ->users()->pluck('email')->toArray();

        // use first email as "to"
        // use MAIL_FROM_ADDRESS as fallback
        $to = array_shift($ccs) ?? config('mail.from.address');

        Mail::raw($body, function ($message) use ($to, $ccs){
            $message->to($to)
            ->cc($ccs)
            ->subject('New job posting on ' . config('app.name'));
        });
    }
}
