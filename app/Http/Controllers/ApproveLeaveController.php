<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproveLeaveRequest;
use App\Services\ApproveLeaveService;
use Exception;

class ApproveLeaveController extends AuthController
{
    protected $approveLeaveService;

    /**
     * ApproveLeavesController constructor.
     */
    public function __construct(ApproveLeaveService $approveLeaveService)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->approveLeaveService = $approveLeaveService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('approveLeave',$this->approveLeaveService->model());
        try {
            $approveLeaves = $this->approveLeaveService->leaveToApprove($this->userEmployeeId());
            return view('leave-approve.index',compact('approveLeaves'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('viewLeave',$this->approveLeaveService->find($id));

        try {
            $approveLeave = $this->approveLeaveService->show($id);
            return view('leave-approve.show',compact('approveLeave'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,$string)
    {
        $this->authorize('viewLeave',$this->approveLeaveService->find($id));

        try {
            $approveLeave = $this->approveLeaveService->find($id);
            return view('leave-approve.edit',compact('approveLeave'));
        }
        catch (Exception $e) {
            return $this->error();

        }
    }

    /**
     * Get Leave State
     */
    public function approve($id,$state)
    {
        $this->authorize('approve',$this->approveLeaveService->find($id));

        try {
            $approveLeave = $this->approveLeaveService->find($id);
            return view('leave-approve.edit',compact('approveLeave','state'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApproveLeaveRequest $request, $id)
    {
        $this->authorize('approve',$this->approveLeaveService->find($id));

        try {
            $this->approveLeaveService->update($id,$request->validated());
            if($request['state'] == 'Acc') {
                return $this->successRoute('approveLeaves.index','Leave has been Accepted');
            }
            else {
                return redirect()->route('approveLeaves.index')->with('error','Leave has been Rejected');
            }
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }
}
