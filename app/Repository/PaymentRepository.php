<?php

namespace App\Repository;

use App\Models\Payment;
use App\Repository\Interfaces\PaymentRepositoryInterface;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    public function __construct(Payment $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all Payments
     */
    public function get()
    {
        return $this->model->with([
            'employee',
            'payee',
            'bank_account'=>function($query) {
                return $query->with(['currency'])->get();
            }
        ])->get();
    }

    /**
     * Create new Payment
     */
    public function create($request)
    {
        $request['payment_format'] = $this->paymentFormat($request['payment_type'],$request['date']);
        return $this->model->create($request);
    }

    public function updating($id, $request)
    {
        $request['payment_format'] = $this->paymentFormat($request['payment_type'],$request['date']);
        return $this->update($id,$request);
    }

    /**
     * Create custom payment number based on payment type
     */
    private function paymentFormat($val,$date)
    {
        if($val == 'TT') {
            return date('y',strtotime($date)).'/'.date('m',strtotime($date)).'/TT';
        }
        else {
            return date('y',strtotime($date)).'/'.date('m',strtotime($date)).'/';
        }
    }

    /**
     * Get all payments which are just created
     */
    public function statusCreated()
    {
        return $this->model->where('status',0)->orWhere('status',1)
            ->with([
            'payee',
            'bank_account'=>function($query) {
                $query->with(['currency'])->get();
            }
        ])->get();
    }

    /**
     * Manage payment status based action
     */
    public function paymentStatus($string = null, $id = null): void
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
