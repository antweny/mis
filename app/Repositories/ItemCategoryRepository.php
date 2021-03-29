<?php

namespace App\Repositories;

use App\Models\ItemCategory;

class ItemCategoryRepository extends BaseRepository
{
    public function __construct(ItemCategory $model)
    {
        parent::__construct($model);
    }

    /**
     * Order by Sort Column Ascending
     */
    public function orderBySortAsc()
    {
        return $this->model->orderBy('sort','asc')->get();
    }

    /**
     * Order by Sort Column Descending
     */
    public function orderBySortDesc()
    {
        return $this->model->orderBy('sort','desc')->get();
    }

}
