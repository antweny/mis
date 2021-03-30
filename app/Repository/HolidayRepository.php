<?php

namespace App\Repository;

use App\Models\Holiday;
use App\Repository\Interfaces\HolidayRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class HolidayRepository extends BaseRepository implements HolidayRepositoryInterface
{
    /**
     * Holiday Repository constructor.
     */
    public function __construct(Holiday $model)
    {
        parent::__construct($model);
    }

}
