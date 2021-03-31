<?php

namespace App\Models;

class ThematicArea extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'thematic areas';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'desc', 'parent_id'];

    /* --------------
     * Relationship
     * ---------------
     */
    public function parent()
    {
        return $this->belongsTo(ThematicArea::class, 'parent_id','id')->withDefault();
    }
    public function child()
    {
        return $this->hasMany(ThematicArea::class, 'parent_id','id');
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Get only thematic sectors
    public function parentOnly()
    {
        return $this->where('parent_id',0)->orderBy('name','asc')->get();
    }


}
