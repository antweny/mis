<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Repository\Interfaces\ActivityRepositoryInterface;
use Exception;

class ActivityController extends AuthController
{
    /**
     * @var
     */
    private $interface;

    /**
     * ActivityController constructor.
     */
    public function __construct(ActivityRepositoryInterface $interface)
    {
        parent::__construct();
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->interface->model());

        try {
            $activities = $this->interface->get();  //Get all activities
            return view('op.activities.index',compact('activities'));
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
        $this->canCreate($this->interface->model());

        try {
            $activity = $this->interface->model();  //Get all employees
            return view('op.activities.create',compact('activity'));
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $activity = $this->interface->find($id);
            return view('op.activities.edit',compact('activity'));
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->updating($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Activity deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
