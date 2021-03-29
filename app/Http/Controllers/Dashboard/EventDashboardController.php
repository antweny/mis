<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;
use App\Services\EventService;

class EventDashboardController extends AuthController
{
    private $event;

    public function __construct(EventService $event)
    {
        parent::__construct();
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event->getNameAndDuration();

        return view('dashboards.event',compact('events'));
    }
}
