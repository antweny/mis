<?php

namespace App\Models;

class BankAccount extends BaseModel
{

    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'bank account';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name', 'stakeholder_id', 'number', 'balance', 'currency_id', 'op', 'desc' ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getStatusAttribute()
    {
        if($this->active == 1) {
            return '<span class="status bg-primary">yes</span>';
        }
        else {
            return '<span class="status bg-danger text-white">no</span>';
        }
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class)->withDefault();
    }
    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class)->withDefault();
    }


}
