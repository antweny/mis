<?php

namespace App\Repositories;

use App\Models\RoomCategory;

class RoomCategoryRepository extends BaseRepository
{

    public function __construct(RoomCategory $model)
    {
        parent::__construct($model);
    }

}
