<?php

namespace App\Repositories;

use App\Models\ItemUnit;

class ItemUnitRepository extends BaseRepository
{
    public function __construct(ItemUnit $model)
    {
        parent::__construct($model);
    }

}
