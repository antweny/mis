<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends AuthController
{

    public function __construct()
    {
        parent::__construct();
//        $this->dash = $dashboardService;
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
        return view('dashboards.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }



}
