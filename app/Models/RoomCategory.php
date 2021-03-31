<?php

namespace App\Models;

class RoomCategory extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'room category';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name', 'desc'];

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
