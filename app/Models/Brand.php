<?php

namespace App\Models;


class Brand extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'brand';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'desc'];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }


}
