<?php

namespace App\Models;

use App\Traits\EmployeeAttendance;


class Attendance extends BaseModel
{
    use EmployeeAttendance;

    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'attendance';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['date', 'time_in', 'time_out', 'total_hours','employee_id'];

    /**
     * ----------------------
     * MODEL ACCESSOR
     * ----------------------
     */

    public function getTimeInAttribute($value)
    {
        return $value ? date("H:i", strtotime( $value )) : null;
    }

    public function getTimeOutAttribute($value)
    {
        return $value ? date("H:i", strtotime( $value )) : '<span class="status bg-success text-white"> active </span>';
    }

    public function getTotalHoursAttribute($value)
    {
        return $value ? date("H:i", strtotime( $value )) : '<span class="status bg-danger text-white"> Not ready </span>';
    }
    public function getStatusAttribute($value)
    {
        if($this->present == 1) {
            return '<span class="status bg-primary">Present</span>';
        }
        else {
            return '<span class="status bg-danger text-white">Absent</span>';
        }
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */

    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }
}
