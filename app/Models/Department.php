<?php

namespace App\Models;

class Department extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'department';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','acronym','desc','manager'];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function employee_number()
    {
        return $this->hasMany(Employee::class)->select('id','name');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'manager','id')->select('id','name')->withDefault();
    }



}
