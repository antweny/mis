<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;


class AuthDashboardController extends AuthController
{
    public function index()
    {
        return view('auth.dashboard');
    }
}
