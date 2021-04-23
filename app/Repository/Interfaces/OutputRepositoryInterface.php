<?php

namespace App\Repository\Interfaces;

interface OutputRepositoryInterface extends BaseRepositoryInterface
{
    /* Group outputs by Outcome */
    public function groupByOutcome();
}
