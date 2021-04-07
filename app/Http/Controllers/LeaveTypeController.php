<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveTypeRequest;
use App\Repository\Interfaces\LeaveTypeRepositoryInterface;
use Exception;

class LeaveTypeController extends AuthController
{
    /**
     * @var
     */
    protected $leaveTypeService;

    /**
     * LeaveTypeController constructor.
     */
    public function __construct(LeaveTypeRepositoryInterface $leaveTypeService)
    {
        parent::__construct();
        $this->leaveTypeService = $leaveTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->leaveTypeService->model());

        try {
            $leaveTypes = $this->leaveTypeService->paginate();  //Get all leaveTypes
            return view('leave.types.index',compact('leaveTypes'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeaveTypeRequest $request)
    {
        $this->canCreate($this->leaveTypeService->model());

        try {
            $this->leaveTypeService->create($request->validated());
            return $this->success('Leave Type created');
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
        $this->canUpdate($this->leaveTypeService->model());

        try {
            $leaveType = $this->leaveTypeService->find($id);
            return view('leave.types.edit',compact('leaveType'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeaveTypeRequest $request, $id)
    {
        $this->canUpdate($this->leaveTypeService->model());

        try {
            $this->leaveTypeService->update($id,$request->validated());
            return $this->successRoute('leaveTypes.index','Leave Type updated');
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
        $this->canDelete($this->leaveTypeService->model());

        try {
            $this->leaveTypeService->delete($id);
            return $this->success('Leave Type deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
