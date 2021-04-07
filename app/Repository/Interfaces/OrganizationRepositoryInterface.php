<?php

namespace App\Repository\Interfaces;

interface OrganizationRepositoryInterface extends BaseRepositoryInterface
{

    /*
     * Get Organization List By Organization Category
     */
    public function getOrganisationListByCategory($name);
}
