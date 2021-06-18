<?php

namespace App\Repository\Interfaces;

interface OrganizationRepositoryInterface extends BaseRepositoryInterface
{
    /* Get Organization List By Organization Category */
    public function getOrganisationListByCategory($name);

    //Export file
    public function export($format);


    //Import file
    public function import(array $attributes);
}
