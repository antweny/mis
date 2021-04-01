<?php

namespace App\Repository\Interfaces;

interface PaymentRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * Manage payment status based action
     */
    public function paymentStatus($string = null, $id = null) : void;

    /**
     * Get payments which not linked to a voucher
     */
    public function statusCreated();



}
