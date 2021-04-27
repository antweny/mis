<?php

namespace App\Repository\Interfaces;

interface ActivityRepositoryInterface extends BaseRepositoryInterface
{
    /* Group activity bu output level */
    public function groupByOutput();


    /* Group by Activity Status */
    public function groupByStatus();

}
