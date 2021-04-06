<?php

namespace App\Models;

use App\Traits\EmployeeId;

class Voucher extends BaseModel
{
    use EmployeeId;

    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'voucher';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['payment_id', 'particulars', 'desc',];

    /**
     * ------------------
     *  MODEL RELATIONSHIP
     * ------------------
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }




}
