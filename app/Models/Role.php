<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Vinkla\Hashids\Facades\Hashids;

class Role extends SpatieRole
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'role';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'guard_name','desc'];

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
    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions');
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
