<?php

namespace App\Models;

class Outcome extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'outcomes';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'desc',
        'department_id',
        'year'
    ];


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getOutcomeNameAttribute()
    {
        return '<strong>'.$this->name.'</strong> : <italic>'.$this->desc.'</italic>';

    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    public function getCurrentYearOutcome()
    {
        return $this->select('id','name','desc')->where('year',date('Y'))->get();
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function output()
    {
        return $this->hasMany(Output::class);
    }

    public function indicator()
    {
        return $this->belongsToMany(Indicator::class);
    }
}
