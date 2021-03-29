<?php

namespace App\Models;

class Experience extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'individual experience';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'individual_id',
        'organization_id',
        'job_title_id',
        'location_id',
        'start_date',
        'end_date',
        'desc',
    ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getHeadingAttribute()
    {
       return $this->job_title_id;
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Individual Location
    public function individual()
    {
        return $this->belongsTo(Individual::class)->withDefault();
    }
    public function Organization()
    {
        return $this->belongsTo(Organization::class)->withDefault();
    }
    public function job_title()
    {
        return $this->belongsTo(JobTitle::class)->withDefault();
    }
    public function location()
    {
        return $this->belongsTo(Location::class)->withDefault();
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    //Check duplicate individual experience
    public function duplicateExperience($individual,$organization,$jobTitle)
    {
        $object = $this->where('individual_id',$individual)->where('organization_id',$organization)->where('job_title_id',$jobTitle)->first();
        if(isset($object)) {
            return true;
        }
        else {
            return false;
        }

    }

}
