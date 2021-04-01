<?php

namespace App\Models;

class LeaveType extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'job type';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name','days','desc' ];

    /**
     * -----------------
     * MODEL FUNCTIONS
     * -----------------
     */
    public function leaveTypeName($id)
    {
        return $this->select('name')->where('id',$id)->first();
    }
}
