<?php

namespace App\Models;

class Output extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'outputs';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'desc', 'outcome_id', 'year'];


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getOutputNameAttribute()
    {
        return '<strong>'.$this->name.'</strong> : <italic>'.$this->desc.'</italic>';

    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function outcome()
    {
        return $this->belongsTo(Outcome::class)->withDefault();
    }

    public function indicator()
    {
        return $this->belongsToMany(Indicator::class);
    }
}
