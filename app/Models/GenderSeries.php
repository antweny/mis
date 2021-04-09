<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenderSeries extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'gender series';


    /* -----------------------------------------
    * The attributes that are mass assignable.
    * -----------------------------------------*/
    protected $fillable = ['topic', 'employee_id', 'date', 'status', 'desc',];


    /**
     * --------------------
     *  ACCESSOR
     * ---------------------
     */
    public function getGenderStatusAttribute()
    {
        if ($this->date < date('Y-m-d'))
        {
            return '<span class="status bg-success text-white">Completed</span>';
        }
        elseif ($this->date == date('Y-m-d')) {
            return '<span class="status bg-warning">Ongoing</span>';
        }
        elseif ($this->date > date('Y-m-d') ){
            return '<span class="status bg-danger text-white">Upcoming</span>';
        }
        else {
            return null;
        }
    }


    /**
     *
     *
     */
    public function getActionAttribute()
    {
        switch ($this->status)
        {
            case 'UPC':
                return '<span class="status bg-info">Upcoming</span>';
                break;
            case 'COMP':
                return '<span class="status bg-success text-white">Completed</span>';
                break;
            case 'NOD':
                return '<span class="status bg-danger text-white">Not Done</span>';
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
    public function facilitator()
    {
        return$this->belongsToMany(Individual::class,'gender_series_facilitator');
    }
    public function employee()
    {
        return$this->belongsTo(Employee::class)->withDefault();
    }







}
