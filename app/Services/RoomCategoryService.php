<?php

namespace App\Services;

use App\Repositories\RoomCategoryRepository;

class RoomCategoryService extends BaseService
{
    public function __construct(RoomCategoryRepository $repo)
    {
        parent::__construct($repo);
    }

}
