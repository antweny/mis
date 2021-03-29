<?php

namespace App\Services;

use App\Repositories\HolidayRepository;


class HolidayService extends BaseService
{
    public function __construct(HolidayRepository $repo)
    {
        parent::__construct($repo);
    }

}
