<?php

namespace App\Repository;

use App\Models\Room;
use App\Repository\Interfaces\RoomRepositoryInterface;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    public function __construct(Room $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->relationshipWith(['room_category']);
    }

}
