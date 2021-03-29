<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobDashboardController extends AuthController
{
   public function index()
   {
       return view('dashboards.job');
   }
}
