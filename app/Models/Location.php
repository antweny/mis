<?php

namespace App\Models;

class Location extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'location';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','desc','parent_id'];


    /* --------------
     * Relationship
     * ---------------
     */
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id','id')->withDefault();
    }
    public function child()
    {
        return $this->hasMany(Location::class, 'parent_id','id');
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //One Location has many Individuals
    public function individual()
    {
        return $this->hasMany(Individual::class);
    }



}
