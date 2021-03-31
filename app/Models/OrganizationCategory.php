<?php

namespace App\Models;

class OrganizationCategory extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'organization category';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'sort', 'desc'];



}
