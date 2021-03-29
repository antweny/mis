<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;

class IndividualDashboardController extends AuthController
{
   public function index()
   {
       return view('dashboards.individual');
   }
}
