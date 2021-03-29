<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;


class HRDashboardController extends AuthController
{
    public function index()
    {
        return view('dashboards.hr');
    }
}
