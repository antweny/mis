<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class LocationDashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.location');
    }
}
