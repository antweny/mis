<?php

namespace App\Models;

class IndividualGroup extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'individual group';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name', 'desc' ];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }


    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */


    //Add individual to groups
    public function individual()
    {
        return$this->belongsToMany(Individual::class,'individual_group_member');
    }
}
