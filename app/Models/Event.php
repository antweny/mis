<?php

namespace App\Models;

class Event extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'event';

    /* -----------------------------------------
    * The attributes that are mass assignable.
    * -----------------------------------------*/
    protected $fillable = [
        'name',
        'parent_id',
        'event_category_id',
        'start_date',
        'end_date',
        'desc',
    ];


    /**
     * --------------------
     *  ACCESSOR
     * ---------------------
     */
    public function getGenderStatusAttribute()
    {
        if ($this->start_date < date('Y-m-d')  && $this->end_date < date('Y-m-d'))
        {
            return '<span class="status bg-success">Completed</span>';
        }
        elseif ($this->start_date < date('Y-m-d')  && $this->end_date > date('Y-m-d')) {
            return '<span class="status bg-warning">Ongoing</span>';
        }
        elseif ($this->start_date > date('Y-m-d') && $this->end_date > date('Y-m-d')){
            return '<span class="status bg-danger text-white">Upcoming</span>';
        }
        elseif ($this->start_date == date('Y-m-d') && $this->end_date == date('Y-m-d')){
            return '<span class="status bg-warning">Ongoing</span>';
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
    public function organiser()
    {
        return$this->belongsToMany(Organization::class,'organisers');
    }
    public function facilitator()
    {
        return$this->belongsToMany(Individual::class,'facilitators');
    }
    public function coordinator()
    {
        return$this->belongsToMany(Employee::class,'event_coordinators');
    }
    public function event_category()
    {
        return$this->belongsTo(EventCategory::class)->withDefault();
    }
    //Event has many facilitators
    public function participant()
    {
        return $this->hasMany(Participant::class);
    }




}
