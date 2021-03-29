<?php

namespace App\Interfaces;

interface BankAccountInterface extends BaseInterface
{

    /**
     * Get Bank Account Number
     */
    public function bankNumber();


    /**
     * Get Bank Account Number and Currency
     */
    public function bankNumberCurrency();

}
