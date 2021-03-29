<?php

namespace App\Models;

class Currency extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'currency';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'acronym',
        'symbol',
        'main',
        'desc'
    ];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getStatusAttribute()
    {
        if($this->main == 1) {
            return '<span class="status bg-primary">yes</span>';
        }
        else {
            return '<span class="status bg-danger text-white">no</span>';
        }
    }

    public function getCurrNameAttribute($value)
    {
        return $this->name.' ('.$this->acronym.')';
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */

    // Select name and id of resources

    public function selectNameAndId()
    {
        return $this->select('name','id','acronym')->orderBy('main','desc')->get();
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Organization Location
    public function bank_account()
    {
        return $this->hasMany(BankAccount::class);
    }



}
