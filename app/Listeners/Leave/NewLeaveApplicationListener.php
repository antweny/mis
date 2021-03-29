<?php

namespace App\Listeners\Leave;

use App\Events\Leave\NewLeaveApplicationEvent;
use App\Mail\Leave\NewLeaveApplicationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewLeaveApplicationListener implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(NewLeaveApplicationEvent $event)
    {
        Mail::to($event->data['receiver']['email'])->send(new NewLeaveApplicationMail($event->data));
    }
}
