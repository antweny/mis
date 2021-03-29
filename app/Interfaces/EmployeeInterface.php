<?php

namespace App\Interfaces;

interface EmployeeInterface extends BaseInterface
{
    /**
     * Get Active Employees
     */
    public function isActive();

    /**
     * Get Active Employees
     */
    public function getActiveNameId();

}
