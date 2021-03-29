<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;

class AssetDashboardController extends AuthController
{
    public function index()
    {
        return view('dashboards.asset');
    }
}
