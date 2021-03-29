<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;


class SettingDashboardController extends AuthController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.setting');
    }
}
