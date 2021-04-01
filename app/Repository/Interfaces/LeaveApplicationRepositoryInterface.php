<?php

namespace App\Repository\Interfaces;

interface LeaveApplicationRepositoryInterface extends BaseRepositoryInterface
{
    /*
     * Fetch leave based on employee logged
     */
    public function employeeLeaves($id);





}
