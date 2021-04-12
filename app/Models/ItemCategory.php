<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'item category';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'sort', 'desc'];
}
