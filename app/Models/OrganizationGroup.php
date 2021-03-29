<?php

namespace App\Models;

class OrganizationGroup extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'organization group';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'desc'
    ];

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    //Get Organization Group By Name


}
