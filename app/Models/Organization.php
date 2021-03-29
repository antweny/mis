<?php

namespace App\Models;

class Organization extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'organization';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'acronym',
        'organization_category_id',
        'founded',
        'address',
        'location_id',
        'website',
        'email',
        'mobile',
        'fax',
        'desc',
    ];

    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getOrgNameAttribute()
    {
        if($this->acronym != null) {
            return $this->name.'('.$this->acronym.')';
        }
        else{
            return $this->name;
        }
    }

    //Make Organization Link Clickable
    public function getNameClickAttribute()
    {
        if($this->acronym != null) {
            return '<a href="'.route('organizations.edit',$this->encode($this->id)).'">'.$this->name.'('.$this->acronym.')'.'</a>';
        }
        else{
            return '<a href="'.route('organizations.edit',$this->encode($this->id)).'">'.$this->name.'</a>';
        }
    }

    //Set Organization Category
    public function getOrgCategoryAttribute()
    {
        return $this->organization_category_id;
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    //Organization Location
    public function location()
    {
        return $this->belongsTo(Location::class)->withDefault();
    }

    //Individual Location
    public function organization_category()
    {
        return $this->belongsTo(OrganizationCategory::class)->withDefault();
    }


    public function organiser()
    {
        return$this->belongsToMany(Event::class,'organisers');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */

}
