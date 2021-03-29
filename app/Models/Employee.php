<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Employee extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'employee';


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'employee_no',
        'name',
        'email',
        'mobile',
        'job_type_id',
        'department_id',
        'user_id',
        'designation_id',
        'location_id',
        'sex',
        'marital_status',
        'children',
        'dob',
        'active',
    ];


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getStatusAttribute()
    {
        if($this->active == 1) {
            return '<span class="status bg-primary">yes</span>';
        }
        else {
            return '<span class="status bg-danger text-white">no</span>';
        }
    }


    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    //Get only active Employees
    public function isActive()
    {
        return $this->select('id','name')->where('active',1)->get();
    }

    // Pluck model name and id
    public function getActiveNameId()
    {
        return $this->where('active',1)->pluck('name','id');
    }

    //Get only employee Email
    public function employeeDetails($id)
    {
        $employee = $this->select('email','name')->where('id',$id)->where('active',1)->first();
        return $employee;
    }


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class)->withDefault();
    }
    public function job_type()
    {
        return $this->belongsTo(JobType::class)->withDefault();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function location()
    {
        return $this->belongsTo(Location::class)->withDefault();
    }


}
