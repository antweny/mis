<?php

namespace App\Models;

class Equipment extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'equipment';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'brand_id',
        'model',
        'asset_type_id',
        'desc'
    ];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }
    public function asset_type()
    {
        return $this->belongsTo(AssetType::class)->withDefault();
    }


}
