<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\AuthController;

class StoreDashboardController extends AuthController
{
   public function index()
   {
       return view('dashboards.store');
   }
}
