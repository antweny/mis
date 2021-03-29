<?php

namespace App\Models;

use App\Traits\EmployeeId;

class ItemOut extends BaseModel
{
    use EmployeeId;
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'item out';

    protected $guarded = ['employee_id'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'item_id',
        'status',
        'req_quantity',
        'quantity_out',
        'issued_at',
        'request_by',
        'remarks',
        'desc',
    ];


    /**
     * ------------------
     *  MODEL ACCESSOR
     * ------------------
     */
    public function getItemStatusAttribute()
    {
        switch ($this->status){
            case 'O' :
                return '<span class="status  bg-maroon text-white">Open</span>';
                break;
            case 'I' :
                return '<span class="status  bg-warning text-black ">Issued</span>';
                break;
            case 'A' :
                return '<span class="status  bg-success text-white ">Accepted</span>';
                break;
            case 'R' :
                return '<span class="status  bg-danger text-white ">Rejected</span>';
                break;
            case 'C' :
                return '<span class="status  bg-dark text-white ">Closed</span>';
                break;
            default:
                return NULL;
        }
    }

    /**
     * ------------------
     *  MODEL RELATIONSHIP
     * ------------------
     */
    public function item()
    {
        return $this->belongsTo(Item::class)->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }
}
