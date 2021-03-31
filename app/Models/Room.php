<?php

namespace App\Models;


class Room extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'room';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['room_category_id', 'name', 'number'];

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Room Category
    public function room_category()
    {
        return $this->belongsTo(RoomCategory::class)->withDefault();
    }

}
