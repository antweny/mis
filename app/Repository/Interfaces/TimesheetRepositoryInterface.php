<?php

namespace App\Repository\Interfaces;

interface TimesheetRepositoryInterface extends BaseRepositoryInterface
{
    public function groupByDate($id);

}
