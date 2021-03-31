<?php

namespace App\Models;


class Activity extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'activities';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'output_id', 'status', 'desc', 'budget', 'employee_id', 'parent_id', 'start_date', 'due_date'];


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getActivityNameAttribute()
    {
        return '<strong>'.$this->name.'</strong> : <italic>'.$this->desc.'</italic>';
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function output()
    {
        return $this->belongsTo(Output::class)->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }
    public function parent()
    {
        return $this->belongsTo(Activity::class, 'parent_id','id')->withDefault();
    }
    public function child()
    {
        return $this->hasMany(Activity::class, 'parent_id','id');
    }
    public function project()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */

    public function currentYearActivity()
    {
        return $this->select('id','name','desc')->get();
    }


}
