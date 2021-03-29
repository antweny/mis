<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveApplicationRequest;
use App\Services\LeaveApplicationService;
use Exception;

class LeaveApplicationController extends AuthController
{
    protected $leaveApplicationService;

    /**
     * LeaveApplicationsController constructor.
     */
    public function __construct(LeaveApplicationService $leaveApplicationService)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->leaveApplicationService = $leaveApplicationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $leaveApplications = $this->leaveApplicationService->getLeave($this->userEmployeeId());
            return view('leave-applications.index',compact('leaveApplications'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $leaveApplication = $this->leaveApplicationService->model();  //Get all employees
            return view('leave-applications.create',compact('leaveApplication'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveApplicationRequest $request)
    {
        try {
            $this->leaveApplicationService->create($request->validated());
            return $this->successRoute('leaveApplications.index','Leave Applied');
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
        $this->canUpdate($this->leaveApplicationService->find($id));

        try {
            $leaveApplication = $this->leaveApplicationService->find($id);
            return view('leave-applications.edit',compact('leaveApplication'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveApplicationRequest $request, $id)
    {
        $this->canUpdate($this->leaveApplicationService->find($id));
        try {
            $this->leaveApplicationService->update($id,$request->validated());
            return $this->successRoute('leaveApplications.index','Leave Application updated');
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
        $this->canUpdate($this->leaveApplicationService->find($id));

        try {
            $this->leaveApplicationService->delete($id);
            return $this->success('Leave Application deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
