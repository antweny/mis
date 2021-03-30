<?php

namespace App\Services;

use App\Repositories\VoucherRepository;
use Illuminate\Support\Facades\DB;

class VoucherService extends BaseService
{
    private $payment;

    public function __construct(VoucherRepository $repo, PaymentService $payment)
    {
        parent::__construct($repo);
        $this->payment = $payment;
    }

    /**
     * Create new Voucher and update the payment status field
     */
    public function create($request)
    {
       DB::beginTransaction();
        try {
            $this->repo->create($request);
            $this->payment->paymentStatus('voucher',$request['payment_id']);
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
            $this->repo->delete($id);
            $this->payment->paymentStatus('cancel',$voucher->payment_id);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



}
