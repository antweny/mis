<?php

namespace App\Services;

use App\Repositories\ItemRepository;

class ItemService extends BaseService
{
    public function __construct(ItemRepository $repo)
    {
        parent::__construct($repo);
    }

}
