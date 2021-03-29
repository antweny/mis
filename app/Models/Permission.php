<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Vinkla\Hashids\Facades\Hashids;

class Permission extends SpatiePermission
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'permission';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'name', 'guard_name','desc'];

    /**
     * Change Route Key
     */
    public function getRouteKey()
    {
        return $this->encode($this->getKey());
    }

    /**
     * ------------------
     *  MODEL RELATIONSHIP
     * ------------------
     */
    public function role()
    {
        return $this->belongsToMany(Role::class,'role_has_permissions');
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */

    //function to encode primary id
    public function encode($val)
    {
        return Hashids::encode($val,1993,1994,2020);
    }

    // Select name and id of resources
    public function selectNameID()
    {
        return $this->select('name','id')->get()->sortBy('name');
    }





}
