<?php

namespace App\Models;

use App\Traits\EmployeeId;
use Illuminate\Support\Carbon;

class Timesheet extends BaseModel
{

    use EmployeeId;

    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'timesheet';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['date', 'time_from', 'time_to', 'activity_id', 'desc', 'comments','employee_id'];

    /**
     * ----------------------
     * MODEL ACCESSOR
     * ----------------------
     */
    public function getTimeFromAttribute($value)
    {
        return date("H:i", strtotime( $value ));
    }

    public function getTimeToAttribute($value)
    {
        return date("H:i", strtotime( $value ));
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */

    public function activity()
    {
        return $this->belongsTo(Activity::class)->withDefault();
    }

}
