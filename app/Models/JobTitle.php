<?php

namespace App\Models;

class JobTitle extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'job title';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'acronym',
        'type',
        'desc'
    ];

    /**
     *  Mutator Model functions
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getTitleNameAttribute()
    {
        if($this->acronym != null) {
            return $this->name.' ('.$this->acronym.')';
        }
        else{
            return $this->acronym;
        }
    }
    //
    public function getTitleTypeAttribute()
    {
        switch ($this->type)
        {
            case 'P':
                return 'Professional';
                break;
            case 'L':
                return 'Leadership';
                break;
            default:
                return 'Leadership';
        }
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    //Get ID, Name and Acronym of data
    public function selectNameIdAcronym()
    {
        return $this->select('id','name','acronym')->get();
    }

}
