<?php

namespace App\Models;

use App\Traits\EmployeeId;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;

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
    protected $fillable = ['payment_no', 'payment_format', 'date', 'payment_type', 'payee_id', 'bank_account_id', 'amount', 'amount_words', 'status', 'employee_id'];

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

    /**
     * -------------------
     *  MODEL FUNCTIONS
     * -------------------
     */
    public function statusCreated()
    {
        return $this->where('status',0)
            ->with(['payee',
                'bank_account'=>function($query) {
                    return $query->with(['currency'])->get();
                }
            ])->get();
    }

    /**
     * Manage payment status based action
     */
    public function statusManage($string = null, $id = null): void
    {
        $payment = $this->find($id); //Find the object

        if ($string == 'voucher') {
            $payment->status = 1;
        }
        elseif ($string == 'approved') {
            $payment->status = 2;
        }
        elseif($string == 'collected') {
            $payment->status = 3;
        }
        else {
            $payment->status = 0;
        }
        $payment->save();
    }




}
