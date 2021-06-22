<?php

namespace App\Repository\Interfaces;

interface IndividualExperienceRepositoryInterface extends BaseRepositoryInterface
{
    /* Get Organization Members based on Organization Category */
    public function organizationMembersList($data);

    /* Get members by organization */
    public function membersByOrganization($data);

    //Export file
    public function export($format);


    //Import file
    public function import(array $attributes);


}
