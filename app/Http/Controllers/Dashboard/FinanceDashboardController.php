<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;

class FinanceDashboardController extends AuthController
{
    public function index()
    {
        return view('dashboards.finance');
    }
}
