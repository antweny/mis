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

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    // Get Bank Account Number
    public function accountNumber()
    {
        return $this->select('id','stakeholder_id','name')->with([
            'stakeholder'=>function($query) {
                return $query->with('organization');
            }
        ])->get();
    }

    //Get Bank Account Currency
    public function accountCurrency()
    {
        return $this->select('id','currency_id','stakeholder_id','name')->with([
            'currency',
            'stakeholder'=>function($query) {
                return $query->with('organization');
            }
        ])->get();
    }






}
