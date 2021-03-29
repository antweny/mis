<?php

namespace App\Models;

class Item extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'item';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'item_category_id',
        'item_unit_id',
        'unit_quantity',
        'order_level',
        'quantity',
        'desc',
    ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getStatusAttribute()
    {
        if ($this->quantity <= $this->min_quantity && $this->quantity != 0 )
        {
            return '<span class="status  bg-warning">Low</span>';
        }
        elseif ($this->quantity > $this->min_quantity) {
            return '<span class="status text-white bg-success">Good</span>';
        }
        elseif ($this->quantity == 0) {
            return '<span class="status text-white bg-danger">Out of Stock</span>';
        }
        else {
            return null;
        }
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function item_category()
    {
        return $this->belongsTo(ItemCategory::class)->withDefault();
    }
    public function item_unit()
    {
        return $this->belongsTo(ItemUnit::class)->withDefault();
    }



}
