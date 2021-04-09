<?php

namespace App\Models;

class EventCategory extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'event category';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'sort', 'desc'];




}
