<?php

namespace App\Repositories;

use App\Models\EventCategory;

class EventCategoryRepository extends BaseRepository
{
    public function __construct(EventCategory $model)
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
