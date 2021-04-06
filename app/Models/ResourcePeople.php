<?php

namespace App\Models;

class ResourcePeople extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'resource people';

    protected $fillable = ['individual_id', 'individual_group_id', 'start_date', 'end_date', 'desc',];

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
    public function individual_group()
    {
        return $this->belongsTo(IndividualGroup::class)->withDefault();
    }
}
