<?php

namespace App\Models;

class ItemIn extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'item in';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'received_at',
        'item_id',
        'unit_rate',
        'quantity_in',
        'remarks',
        'desc'
    ];


    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    public function setQuantityInAttribute($value)
    {
        $this->attributes['quantity_in'] = $value;
        $this->attributes['amount'] = $this->unit_rate * $value;
    }

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getAmountAttribute($value)
    {
        return number_format($value,2);
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //All received belongs to a particular item
    public function item()
    {
        return $this->belongsTo(Item::class)->withDefault();
    }




}
