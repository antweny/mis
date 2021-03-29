<?php

namespace App\Listeners\Leave;

use App\Events\Leave\LeaveApproveEvent;
use App\Mail\Leave\LeaveApproveMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LeaveApproveListener implements ShouldQueue
{

    /**
     * Handle the event.
     */
    public function handle(LeaveApproveEvent $event)
    {
        Mail::to($event->data['email'])->send(new LeaveApproveMail($event->data));
    }
}
