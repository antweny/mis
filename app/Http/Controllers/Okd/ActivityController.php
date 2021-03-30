<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Services\ActivityService;
use Exception;

class ActivityController extends AuthController
{
    /**
     * @var
     */
    private $activityService;

    /**
     * ActivityController constructor.
     */
    public function __construct(ActivityService $activityService)
    {
        parent::__construct();
        $this->activityService = $activityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->activityService->model());

        try {
            $activities = $this->activityService->withRelation();  //Get all activities
            return view('activities.index',compact('activities'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $this->canCreate($this->activityService->model());

        try {
            $activity = $this->activityService->model();  //Get all employees
            return view('activities.create',compact('activity'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityRequest $request)
    {
        $this->canCreate($this->activityService->model());

        try {
            $this->activityService->create($request->validated());
            return $this->success('Activity created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->activityService->model());

        try {
            $activity = $this->activityService->find($id);
            return view('activities.edit',compact('activity'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityRequest $request, $id)
    {
        $this->canUpdate($this->activityService->model());

        try {
            $this->activityService->update($id,$request->validated());
            return $this->successRoute('activities.index','Activity updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->activityService->model());

        try {
            $this->activityService->delete($id);
            return $this->success('Activity deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
