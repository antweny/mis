<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Repository\Interfaces\AttendanceRepositoryInterface;
use Exception;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{

    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }

    /*
     * Get all user attendance
     */
    public function get()
    {
       return $this->relationshipWith(['employee']);
    }

    /*
     * Create New Attendance
     */
    public function create($request)
    {
        try {
            $request['total_hours'] = $this->calculateTotalHours($request['time_in'],$request['time_out']);
            $this->model->create($request);
            return true;
        }
        catch(Exception $e) {
            throw $e;
        }
    }

    /*
     * Create New Attendance
     */
    public function updating($id,$request)
    {
        try {
            $request['total_hours'] = $this->calculateTotalHours($request['time_in'],$request['time_out']);
            $this->update($id,$request);
            return true;
        }
        catch(Exception $e) {
            throw $e;
        }
    }

    /*
     * Calculate total hours
     */
    private function calculateTotalHours($time1,$time2)
    {
        return totalHours($time1,$time2);
    }


    public function checkIn($id)
    {
        if (!is_null($this->singleCheckIn($id))) {
            $attendance = $this->singleCheckIn($id);
            /* check out the employee before check in again */
            $this->employeeCheckingOut($attendance);
            /* employee checking in */
            $this->employeeCheckingIn();
        }
        else {
            $this->employeeCheckingIn();
        }
    }

    /* Employee check out */
    public function checkOut($id)
    {
        $attendance = $this->singleCheckIn($id);
        return $this->employeeCheckingOut($attendance);
    }

    /* Get current time */
    private function getTime()
    {
        return date('H:i:s');
    }

    /* Only once employee can check in once in a day */
    private function singleCheckIn($id)
    {
        return $this->model->where('employee_id',$id)
            ->where('date',date('Y-m-d'))
            ->where('time_out',null)
            ->first();
    }

    /* Employee Checking Out */
    private function employeeCheckingOut($attendance)
    {
        $attendance->time_out = $this->getTime();
        $attendance->total_hours = $this->calculateTotalHours($attendance->time_in,$attendance->time_out);
        $attendance->save();
        return $attendance;
    }

    /* Employee Checking In */
    private function employeeCheckingIn()
    {
        return $this->model->create([
            'date' => date('Y-m-d'),
            'time_in'=>$this->getTime(),
        ]);
    }



}
