<?php

namespace App\Listeners\User;

use App\Events\User\NewUserEvent;
use App\Mail\Mail\NewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewUserListener implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(NewUserEvent $event)
    {
        Mail::to($event->user['email'])->send(new NewUserMail($event->user));
    }
}
