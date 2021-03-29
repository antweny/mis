<?php

namespace App\Repositories;

use App\Models\Holiday;

class HolidayRepository extends BaseRepository
{
    public function __construct(Holiday $model)
    {
        parent::__construct($model);
    }

}
