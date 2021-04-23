<?php

namespace App\Repository\Interfaces;

interface ActivityRepositoryInterface extends BaseRepositoryInterface
{
    /* Group activity bu output level */
    public function groupByOutput();

}
