<?php

namespace App\Events\Leave;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewLeaveApplicationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
       $this->data = $data;
    }

}
