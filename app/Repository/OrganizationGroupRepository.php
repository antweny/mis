<?php

namespace App\Repository;

use App\Models\OrganizationGroup;
use App\Repository\Interfaces\OrganizationGroupRepositoryInterface;

class OrganizationGroupRepository extends BaseRepository implements OrganizationGroupRepositoryInterface
{

    public function __construct(OrganizationGroup $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all Donor Group
     */
    public function donorGroup ()
    {
        return $this->model->getByName('Donor');
    }


}
