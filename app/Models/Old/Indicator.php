<?php

namespace App\Models;

class Indicator extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'indicators';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'desc',
    ];


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */



    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function output()
    {
        return $this->hasMany(Output::class);
    }
}
