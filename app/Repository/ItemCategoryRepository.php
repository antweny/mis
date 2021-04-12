<?php

namespace App\Repository;

use App\Models\ItemCategory;
use App\Repository\Interfaces\ItemCategoryRepositoryInterface;

class ItemCategoryRepository extends BaseRepository implements ItemCategoryRepositoryInterface
{
    public function __construct(ItemCategory $model)
    {
        parent::__construct($model);
    }


}
