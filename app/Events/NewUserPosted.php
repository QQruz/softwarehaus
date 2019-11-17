<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Job;

class NewUserPosted
{
    use SerializesModels;

    public $job;

    /**
     * Create a new event instance.
     *
     * @param  \App\Job $job
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }


}
