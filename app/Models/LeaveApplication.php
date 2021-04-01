<?php

namespace App\Models;

use App\Traits\EmployeeId;

class LeaveApplication extends BaseModel
{
    use EmployeeId;
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'leave application';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'send_to', 'leave_type_id', 'start_date', 'end_date', 'days', 'desc' ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getTitleNameAttribute()
    {
        if($this->acronym != null) {
            return $this->name.' ('.$this->acronym.')';
        }
        else{
            return $this->acronym;
        }
    }

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getLeaveStatusAttribute()
    {
        switch ($this->status) {
            case 'Rev';
                return '<span class="status  bg-primary"> In Review</span>';;
                break;
            case 'Acc';
                return '<span class="status text-white bg-success"> Accepted</span>';
                break;
            case 'Rej';
                return '<span class="status text-white bg-danger"> Rejected</span>';
                break;
            default;
                return '<span class="status text-white bg-maroon"> Submitted</span>';
        }
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function leave_type()
    {
        return $this->belongsTo(LeaveType::class)->withDefault();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault()->withDefault();
    }

    public function approver()
    {
        return $this->belongsTo(Employee::class,'send_to')->withDefault();
    }

    /**
     * ---------------
     * MODEL FUNCTION
     * ---------------
     */
    //get leave request
    public function leaveRequest($id)
    {
        return $this->where('send_to',$id);
    }



}
