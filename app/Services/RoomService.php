<?php

namespace App\Services;

use App\Repositories\RoomRepository;

class RoomService extends BaseService
{

    public function __construct(RoomRepository $repo)
    {
        parent::__construct($repo);
    }

}
