<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Vinkla\Hashids\Facades\Hashids;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use LogsActivity;

    /**
     * Log all activities performed on the model
     */

    protected static $ignoreChangedAttributes = ['password','updated_at'];

    protected static $logName = 'user';

    protected static $logAttributes = ['name','email','active'];

    protected static $logOnlyDirty = true;




    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'active',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    //User has many Roles
    public function role()
    {
        return $this->belongsToMany(Role::class,'model_has_roles','model_id');
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */

    // Encode USer ID
    public function encode($val)
    {
        return Hashids::encode($val,1993,1994,2020);
    }

    //Select name and id of resources
    public function selectNameAndId()
    {
        return $this->select('name','id')->get()->sortBy('name');
    }

    public function canAll(array $permissions)
    {
        foreach($permissions as $e){
            if(!$this->can($e)) return false;
        }

        return true;
    }
}
