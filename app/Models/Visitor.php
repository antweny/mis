<?php

namespace App\Models;

class Visitor extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'visitor';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'date','individual_id','location_id','organization_id','employee_id','check_in','check_out','desc' ];

    /**
     * ----------------------
     * MODEL ACCESSOR
     * ----------------------
     */
    public function getCheckInAttribute($value)
    {
        return date("H:i", strtotime( $value ));
    }

    public function getCheckOutAttribute($value)
    {
        if(!is_null($value)) {
            return date("H:i", strtotime( $value ));
        }
        return null;
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function individual()
    {
        return$this->belongsTo(Individual::class)->withDefault();
    }
    public function location()
    {
        return$this->belongsTo(Location::class)->withDefault();
    }
    public function organization()
    {
        return$this->belongsTo(Organization::class)->withDefault();
    }
    public function employee()
    {
        return$this->belongsTo(Employee::class)->withDefault();
    }





}
