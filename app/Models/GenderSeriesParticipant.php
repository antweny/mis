<?php

namespace App\Models;

class GenderSeriesParticipant extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'gender series participant';

    /**
     * -----------------------------------------
     * The attributes that are mass assignable.
     * -----------------------------------------
     */
    protected $fillable = [
        'individual_id',
        'organization_id',
        'location_id',
        'gender_series_id',
        'participant_role_id',
        'individual_group_id'
    ];


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

    public function gender_series()
    {
        return $this->belongsTo(GenderSeries::class)->withDefault();
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
