<?php

namespace App\Models;


class Holiday extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'holiday';

    /**
     * Fields not fillable
     */
    protected $guarded = ['active'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name','date','repeat','desc' ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getIsActiveAttribute()
    {
        if($this->active == 1) {
            return '<span class="status bg-primary">yes</span>';
        }
        else {
            return '<span class="status bg-danger text-white">no</span>';
        }
    }
    public function getYearlyAttribute()
    {
        if($this->repeat == 1) {
            return '<span class="status bg-primary">yes</span>';
        }
        else {
            return '<span class="status bg-danger text-white">no</span>';
        }
    }


}
