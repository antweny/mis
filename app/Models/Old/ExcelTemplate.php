<?php

namespace App\Models;

class ExcelTemplate extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'excel template
    ';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'path',
        'desc'
    ];




}
