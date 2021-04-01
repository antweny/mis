<?php

namespace App\Models;

class Asset extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'asset';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['equipment_id', 'serial_no', 'code_number', 'item_unit_id', 'date', 'remarks',];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class)->withDefault();
    }
    public function item_unit()
    {
        return $this->belongsTo(ItemUnit::class)->withDefault();
    }
}
