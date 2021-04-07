<?php

namespace App\Repository\Interfaces;

interface IndividualExperienceRepositoryInterface extends BaseRepositoryInterface
{
    /*
     * Get Organization Members based on Organization Category
     */
    public function organizationMembersList($data);


    /*
     * Get members by organization
     */
    public function membersByOrganization($data);


}
