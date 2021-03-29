<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;

class OrganizationDashboardController extends AuthController
{
    public function index()
    {
        return view('dashboards.organization');
    }
}
