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
    protected $fillable = ['name', 'desc',];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function output()
    {
        return $this->hasMany(Output::class);
    }
}
