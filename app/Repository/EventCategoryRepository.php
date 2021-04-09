<?php

namespace App\Repository;

use App\Models\EventCategory;
use App\Repository\Interfaces\EventCategoryRepositoryInterface;

class EventCategoryRepository extends BaseRepository implements EventCategoryRepositoryInterface
{
    public function __construct(EventCategory $model)
    {
        parent::__construct($model);
    }

    /**
     * Order by Sort Column Ascending
     */
    public function get()
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
