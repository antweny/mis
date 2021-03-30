<?php

namespace App\Services;

use App\Repositories\IndicatorRepository;

class IndicatorService extends BaseService
{
    public function __construct(IndicatorRepository $repo)
    {
        parent::__construct($repo);
    }

}
