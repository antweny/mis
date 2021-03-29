<?php

namespace App\Repositories;

use App\Models\Indicator;

class IndicatorRepository extends BaseRepository
{
    public function __construct(Indicator $model)
    {
        parent::__construct($model);
    }


}
