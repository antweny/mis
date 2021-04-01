<?php

namespace App\Models;

class ItemUnit extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'item unit';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'desc'];
}
