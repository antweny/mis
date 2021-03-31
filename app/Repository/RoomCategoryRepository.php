<?php

namespace App\Repository;

use App\Models\RoomCategory;
use App\Repository\Interfaces\RoomCategoryRepositoryInterface;

class RoomCategoryRepository extends BaseRepository implements RoomCategoryRepositoryInterface
{
    public function __construct(RoomCategory $model)
    {
        parent::__construct($model);
    }

}
