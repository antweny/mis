<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\Holiday;
use App\Models\LeaveApplication;
use App\Models\LeaveType;
use Carbon\Carbon;

class LeaveApplicationRepository extends BaseRepository
{
    protected $holiday;
    private $employee;
    private $leaveType;

    public function __construct(LeaveApplication $model, Holiday $holiday, Employee $employee, LeaveType $leaveType)
    {
        parent::__construct($model);
        $this->holiday = $holiday;
        $this->employee = $employee;
        $this->leaveType = $leaveType;
    }

    /**
     * Get all authenticated user leave
     */
    public function userLeaves($id)
    {
        return $this->model->where('employee_id',$id)->with(['leave_type','approver'])->get();
    }

    /**
     * Get the receiver details
     */
    public function receiverDetails($id)
    {
        return $this->employee->employeeDetails($id);
    }

    /**
     * Get leave type name
     */
    public function leaveType($id)
    {
        $leave = $this->leaveType->select('name')->where('id',$id)->first();
        return $leave->name;
    }

    /**
     * Get total leave days
     */
    public function days($startDate, $endDate)
    {
        $holidays = $this->getHolidays(); //Get all public holidays
        $leaveDays = 0; //Declare values which hold leave days
        //Format the dates
        $startDate = Carbon::createFromFormat('Y-m-d',$startDate);
        $endEnd = Carbon::createFromFormat('Y-m-d',$endDate);
        //Check user dates
        for($date = $startDate; $date <= $endEnd; $date->modify('+1 day')) {
            if (!$date->isWeekend() && !in_array($date,$holidays)) {
                $leaveDays++; //Increment days if not weekend and public holidays
            }
        }
        return $leaveDays; //return total days
    }

    /**
     * Get Current Year Public Holidays
     */
    private function getHolidays()
    {
        $holidays = array();
        $dates = $this->holiday->select('date')->where('active',1)->get();
        foreach ($dates as $date) {
            $holidays[]=Carbon::createFromFormat('Y-m-d',$date->date);
        }
        return $holidays;
    }

}
