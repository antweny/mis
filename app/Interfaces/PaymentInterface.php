<?php

namespace App\Interfaces;

interface PaymentInterface extends BaseInterface
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
