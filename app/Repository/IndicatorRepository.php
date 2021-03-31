<?php

namespace App\RepositorY;

use App\Models\Indicator;
use App\Repository\Interfaces\IndicatorRepositoryInterface;

class IndicatorRepository extends BaseRepository implements IndicatorRepositoryInterface
{

    public function __construct(Indicator $model)
    {
        parent::__construct($model);
    }


}
