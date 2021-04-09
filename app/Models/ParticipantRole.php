<?php

namespace App\Models;

class ParticipantRole extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'participant role';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'desc'];
}
