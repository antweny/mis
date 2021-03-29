<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'projects';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'isActive',
        'desc',
        'stakeholder_id',
        'start_date',
        'end_date',
        'reporting_period',
    ];

    /**
     * --------------------
     *  ACCESSOR
     * ---------------------
     */
    public function getReportPeriodAttribute()
    {
        switch ($this->reporting_period){
            case 'QRT':
                return 'Quarterly';
                break;
            case 'BIA':
                return 'Biannual';
                break;
            case 'ANN':
                return 'Annual';
                break;
            default:
                return null;
        }
    }

    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function coordinator()
    {
        return$this->belongsToMany(Employee::class,'project_coordinators');
    }
    public function stakeholder()
    {
        return$this->belongsTo(Stakeholder::class)->withDefault();
    }

}
