<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends BaseModel
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
        'desc'
    ];


}
