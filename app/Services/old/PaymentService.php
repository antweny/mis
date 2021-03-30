<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService extends BaseService
{
    public function __construct(PaymentRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Manage payment status based action
     */
    public function paymentStatus($string, $id)
    {
        return $this->repo->paymentStatus($string,$id);
    }

    public function update($id, $request)
    {
        return $this->repo->updateData($id, $request);
    }


}
