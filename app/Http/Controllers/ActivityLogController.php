<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\ActivityLogRepositoryInterface;

class ActivityLogController extends AuthController
{
    private $activity;

    public function __construct(ActivityLogRepositoryInterface $activity)
    {
        parent::__construct();
        $this->middleware('role:superAdmin');
        $this->activity = $activity;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $activities = $this->activity->get();
            return view('settings.activity-logs.index',compact('activities'));
        }
        catch (\Exception $e){
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        try {
            $activity = $this->activity->find($id);
            return view('settings.activity-logs.show',compact('activity'));
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }

}
