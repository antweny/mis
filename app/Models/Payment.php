<?php

namespace App\Models;

use App\Traits\EmployeeId;

class Payment extends BaseModel
{
    use EmployeeId;
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'payment';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'payment_no',
        'payment_format',
        'date',
        'payment_type',
        'payee_id',
        'bank_account_id',
        'amount',
        'amount_words',
        'status',
        'employee_id'
    ];

    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */



    /**
     * ------------------
     *  MODEL RELATIONSHIP
     * ------------------
     */
    public function payee()
    {
        return $this->belongsTo(Payee::class)->withDefault();
    }

    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class)->withDefault();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault();
    }



}
