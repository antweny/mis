<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApproveLeaveRequest;
use App\Repository\Interfaces\LeaveApproveRepositoryInterface;
use Exception;

class LeaveApproveController extends AuthController
{
    protected $leaveApproveService;

    /**
     * ApproveLeavesController constructor.
     */
    public function __construct(LeaveApproveRepositoryInterface $leaveApproveService)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->leaveApproveService = $leaveApproveService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('leaveApprove',$this->leaveApproveService->model());
        try {
            $leaveApproves = $this->leaveApproveService->leaveRequest($this->userEmployeeId());
            return view('leave-approve.index',compact('leaveApproves'));
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
        $this->authorize('viewLeave',$this->leaveApproveService->find($id));

        try {
            $leaveApprove = $this->leaveApproveService->viewLeaveDetails($id);
            return view('leave-approve.show',compact('leaveApprove'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit($id,$string)
//    {
//        $this->authorize('viewLeave',$this->leaveApproveService->find($id));
//
//        dd($string);
//        try {
//            $leaveApprove = $this->leaveApproveService->find($id);
//            return view('leave-approve.edit',compact('leaveApprove'));
//        }
//        catch (Exception $e) {
//            return $this->error();
//
//        }
//    }

    /**
     * Get Leave State
     */
    public function approve($id,$state)
    {
        $this->authorize('approve',$this->leaveApproveService->find($id));
        try {
            $leaveApprove = $this->leaveApproveService->find($id);
            return view('leave-approve.edit',compact('leaveApprove','state'));
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
        $this->authorize('approve',$this->leaveApproveService->find($id));

        try {
            $this->leaveApproveService->update($id,$request->validated());
            if($request['status'] == 'Acc') {
                return $this->successRoute('leaveApproves.index','Leave has been Accepted');
            }
            else {
                return redirect()->route('leaveApproves.index')->withErrors('Leave has been Rejected');
            }
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }
}
