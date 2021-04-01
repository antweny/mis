<?php

namespace App\Repository;

use App\Events\Leave\NewLeaveApplicationEvent;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
use App\Repository\Interfaces\LeaveApplicationRepositoryInterface;
use Exception;

class LeaveApplicationRepository extends BaseRepository implements LeaveApplicationRepositoryInterface
{
    protected $holiday;
    protected $employee;
    protected $leaveType;

    public function __construct(LeaveApplication $model, Holiday $holiday, Employee $employee, LeaveType $leaveType)
    {
        parent::__construct($model);
        $this->holiday = $holiday;
        $this->employee = $employee;
        $this->leaveType = $leaveType;
    }

    /**
     * Get Specific Leave
     */
    public function employeeLeaves($id)
    {
        return $this->model->where('employee_id',$id)
            ->with(['leave_type','approver'])
            ->get();
    }

    /**
     * Create new leave application
     */
    public function create($request)
    {
        try {
            $request['days'] = $this->days($request['start_date'],$request['end_date']);
            //create new leave
            $leave = $this->model->create($request);
            //Send email notification
            $this->newLeaveApplicationEmailNotification($leave);
            return true;
        }
        catch (Exception $e) {
            throw $e;
        }
    }

    /*
     * Update Employee leave notification
     */
    public function updating($id, $request)
    {
        $request['days'] = $this->days($request['start_date'],$request['end_date']);
        return $this->update($id,$request);
    }

    /**
     * Get total leave days
     */
    private function days($startDate, $endDate)
    {
        $holidays = $this->holiday->holidayDateArray(); //Get all Active public holidays

        $leaveDays = 0; //Declare values which hold leave days

        //Format the dates
        $startDate = formatDate($startDate);
        $endEnd = formatDate($endDate);

        //Check user dates
        for($date = $startDate; $date <= $endEnd; $date->modify('+1 day')) {
            if (!$date->isWeekend() && !in_array($date,$holidays)) {
                $leaveDays++; //Increment days if not weekend and public holidays
            }
        }
        return $leaveDays; //return total days
    }

    /*
     * Send new employee email notification to the approver
     */
    private function newLeaveApplicationEmailNotification ($leave)
    {
        try {
            $data = [
                'receiver' => $this->employee->employeeNameEmail($leave->send_to), //Approver
                'leave_type' => $this->leaveType->leaveTypeName($leave->leave_type_id),
                'days' => $leave->days,
                'start_date' => $leave->start_date,
                'end_date' => $leave->end_date,
                'desc' => $leave->desc,
                'id'=>$leave->id
            ];
            event(new NewLeaveApplicationEvent($data));
            return true;
        }
        catch (Exception $e) {
            throw $e;
        }
    }




}
