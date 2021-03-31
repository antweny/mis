<?php

namespace App\Repositories;

use App\Models\OrganizationGroup;

class OrganizationGroupRepository extends BaseRepository
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
