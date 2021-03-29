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
    protected $fillable = [
        'name',
        'days',
        'desc',
    ];
}
