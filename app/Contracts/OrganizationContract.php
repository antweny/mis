<?php

namespace App\Contracts;

interface OrganizationContract extends BaseContract
{
    /**
     * Check for duplicate name and mobile not to import
     */
    public function duplicateCheck($name);


    /**
     * Get Model Relation resource ID
     */
    public function locationId($val);


    /**
     * Get Model Relation resource ID
     */
    public function categoryId($val);

}
