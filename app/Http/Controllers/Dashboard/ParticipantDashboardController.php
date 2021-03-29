<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;


class ParticipantDashboardController extends AuthController
{
    public function index()
    {
        return view('dashboards.participant');
    }
}
