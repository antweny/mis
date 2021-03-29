<?php

namespace App\Models;

class Designation extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'designation';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','acronym','desc'];

}
