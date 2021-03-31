<?php

namespace App\Repositories;

use App\Models\OrganizationCategory;

class OrganizationCategoryRepository extends BaseRepository
{

    public function __construct(OrganizationCategory $model)
    {
        parent::__construct($model);
    }

    /**
     * Order by Sort Column Ascending
     */
    public function orderBySortAsc()
    {
        return $this->model->orderBySortAsc();
    }

    /**
     * Order by Sort Column Descending
     */
    public function orderBySortDesc()
    {
        return $this->model->orderBySortDesc();
    }
}
