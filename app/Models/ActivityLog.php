<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Vinkla\Hashids\Facades\Hashids;

class ActivityLog extends SpatieActivity
{
    protected $table = 'activity_log';


    /**
     * Change Route Key
     */
    public function getRouteKey()
    {
        return $this->encode($this->getKey());
    }

    //Activity logs are performed by different admins
    public function user()
    {
        return $this->belongsTo(User::class,'causer_id')->withDefault();
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    // function to encode ID
    public function encode($val)
    {
        return Hashids::encode($val,1993,1994,2020);
    }




}
