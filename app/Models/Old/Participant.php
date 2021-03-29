<?php

namespace App\Models;

class Participant extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'participant';

    /**
     * -----------------------------------------
     * The attributes that are mass assignable.
     * -----------------------------------------
     */
    protected $fillable = [
        'individual_id',
        'organization_id',
        'location_id',
        'event_id',
        'date',
        'level',
        'participant_role_id',
        'individual_group_id'
    ];


    /**
     * ------------------
     *  MODEL ACCESSOR
     * ------------------
     */
    public function getParticipantLevelAttribute()
    {
        switch ($this->level)
        {
            case 'I':
                return 'International';
                break;
            case 'L':
                return 'Local';
                break;
            default:
                return null;
                break;
        }
    }


    /**
     * ------------------
     *  MODEL RELATIONSHIP
     * ------------------
     */
    public function individual()
    {
        return $this->belongsTo(Individual::class)->select('id','name','mobile','sex','age_group')->withDefault();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class)->select('id','name','acronym')->withDefault();
    }

    public function event()
    {
        return $this->belongsTo(Event::class)->select('id','name')->withDefault();
    }

    public function location()
    {
        return $this->belongsTo(Location::class)->select('id','name')->withDefault();
    }

    public function participant_role()
    {
        return $this->belongsTo(ParticipantRole::class)->withDefault();
    }

    public function individual_group()
    {
        return $this->belongsTo(IndividualGroup::class)->withDefault();
    }


}
