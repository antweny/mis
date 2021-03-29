<?php

namespace App\Models;

class AssetType extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'asset type';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'parent_id',
        'desc'
    ];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
//    public function getParentNameAttribute()
//    {
//        if(!is_null($this->parent_id)) {
//
//        }
//        return null;
//        if($this->acronym != null) {
//            return $this->name.'('.$this->acronym.')';
//        }
//        else{
//            return $this->name;
//        }
//    }

    /* --------------
     * Relationship
     * ---------------
     */
    public function parent()
    {
        return $this->belongsTo(AssetType::class, 'parent_id','id')->withDefault();
    }


}
