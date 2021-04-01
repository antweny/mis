<?php

namespace App\Models;

class Payee extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'payee';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'mobile', 'address', 'email', 'group'];


}
