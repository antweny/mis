<?php

namespace App\Repositories\Item;

use App\Repositories\BaseRepository;
use App\Models\ItemOut;

class ItemOutRepository extends  BaseRepository
{
    /**
     * Item Out Repository constructor.
     */
    public function __construct(ItemOut $model)
    {
        parent::__construct($model);
    }
}
