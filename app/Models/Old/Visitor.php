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
    protected $fillable = [
        'individual_id',
        'location_id',
        'organization_id',
        'employee_id',
        'check_in',
        'check_out',
        'desc',
    ];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setCheckInAttribute($value)
    {
        $this->attributes['check_in'] = date_to_mysql($value);
    }
    protected function setCheckOutAttribute($value)
    {
        if(!is_null($value)) {
            $this->attributes['check_out'] = date_to_mysql($value);
        }

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
