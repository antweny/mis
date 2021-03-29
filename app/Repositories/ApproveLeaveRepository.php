<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\LeaveApplication;

class ApproveLeaveRepository extends BaseRepository
{
    private $employee;

    public function __construct(LeaveApplication $model, Employee $employee)
    {
        parent::__construct($model);
        $this->employee = $employee;
    }

    /**
     * Get all leave to approve for a user
     */
    public function leaveToApprove($id)
    {
        return $this->model->where('send_to',$id)->with(['leave_type','employee'])->get();
    }

    /**
     * View Leave Application
     */
    public function show($id)
    {
        $leave = $this->find($id);
        if($leave->status == 'Sub') {
            $leave->status = 'Rev';
            $leave->save();
        }
        else {
            return $leave;
        }
    }

    /**
     * Approve the Leave
     */
    public function update($id,$request)
    {
        $leave = $this->find($id);
        $leave->status = $request['state'] ;
        $leave->remarks = $request['remarks'];
        $leave->save();
        return $leave;
    }

    /**
     * Employee Name
     */
    public function employeeName($id)
    {
        $employee = $this->employee->select('name')->where('id',$id)->first();
        return $employee->name;
    }
    /**
     * Employee Name
     */
    public function employeeEmail($id)
    {
        $employee = $this->employee->select('email')->where('id',$id)->first();
        return $employee->email;
    }



}
