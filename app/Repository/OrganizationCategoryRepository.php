<?php

namespace App\Repository;

use App\Models\OrganizationCategory;
use App\Repository\Interfaces\OrganizationCategoryRepositoryInterface;

class OrganizationCategoryRepository extends BaseRepository implements OrganizationCategoryRepositoryInterface
{

    public function __construct(OrganizationCategory $model)
    {
        parent::__construct($model);
    }

}
