<?php

namespace App\Models;

class Department extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'department';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'acronym',
        'desc',
        'manager'
    ];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class,'manager')->select('name','id')->withDefault();
    }


}
