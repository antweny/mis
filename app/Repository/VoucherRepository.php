<?php

namespace App\Repository;

use App\Models\Payment;
use App\Models\Voucher;
use App\Repository\Interfaces\VoucherRepositoryInterface;
use Illuminate\Support\Facades\DB;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    protected $payment;

    public function __construct(Voucher $model, Payment $payment)
    {
        parent::__construct($model);
        $this->payment = $payment;
    }

    /**
     * Get All voucher with relationship models
     */
//    public function get()
//    {
//        return $this->model->with([
//            'employee',
//            'payment.payee'=>function($query) {
//                return $query->with([
//                    'payee',
//                    'bank_account'=>function($query){
//                        return $query->with(['currency'])->get();
//                    }
//                ])->get();
//            },
//        ])->get();
//    }

    public function get()
    {
        return $this->model->with(['employee','payment.payee', 'payment.bank_account'])->get();
    }

    /**
     * Create new Voucher and update the payment status field
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $this->model->create($request);
            $this->payment->statusManage('voucher',$request['payment_id']);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Delete Voucher and update the payment status field
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $voucher = $this->find($id);
            $voucher->delete();
            $this->payment->statusManage('cancel',$voucher->payment_id);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


}
