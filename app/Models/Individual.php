<?php

namespace App\Models;

class Individual extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'individual';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'age_group', 'mobile', 'sex', 'address', 'email', 'occupation', 'location_id'];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    protected function setMobileAttribute($value)
    {
        if(is_null($value)) {
            $this->attributes['mobile'] = 0;
        }
        else {
            $this->attributes['mobile'] = $value;
        }

    }

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getIndividualNameAttribute()
    {
        if($this->mobile != null) {
            return $this->name.' ('.$this->mobile.')';
        }
        else{
            return $this->name;
        }
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Individual Location
    public function location()
    {
        return $this->belongsTo(Location::class)->withDefault();
    }
    public function facilitator()
    {
        return$this->belongsToMany(Event::class,'facilitators');
    }
    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
    public function individual_group()
    {
        return$this->belongsToMany(IndividualGroup::class,'individual_group_member');
    }


    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    // Get Record ID if not exist Create new Record
    public function returnIndividualID($name, $mobile)
    {
        $object = $this->where('name',$name)->where('mobile',$mobile)->first();
        if(!isset($object)) {
            $object = $this->create([
                'name'=>$name,
                'mobile'=>$mobile
            ]);
            return $object->id;
        }
        else {
            return $object->id;
        }
    }

    // Get Record ID if not exist Create new Record
    public function duplicateIndividual($name, $mobile)
    {
        $object = $this->where('name',$name)->where('mobile',$mobile)->first();
        if(isset($object)) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Select Name, ID and Mobile for dropdown form
     */
    public function selectnameIDMobile()
    {
        return $this->select('id','name','mobile')->get();
    }

}
