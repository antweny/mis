<?php

namespace App\Repository;

use App\Models\ItemUnit;
use App\Repository\Interfaces\ItemUnitRepositoryInterface;

class ItemUnitRepository extends BaseRepository implements ItemUnitRepositoryInterface
{
    public function __construct(ItemUnit $model)
    {
        parent::__construct($model);
    }

}
