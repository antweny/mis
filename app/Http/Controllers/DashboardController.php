<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\DashboardRepositoryInterface;

class DashboardController extends AuthController
{
    protected $dashboard;

    public function __construct( DashboardRepositoryInterface $dashboard)
    {
        parent::__construct();
        $this->dashboard = $dashboard;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $individual = $this->dash->individual();
//        $organization = $this->dash->organization();
//        $kc = $this->dash->kc();
//        return view('dashboards.home',compact('individual','organization','kc'));
        return view('dashboard');
    }


}
