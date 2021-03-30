<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class CurrencyService extends BaseService
{
    public function __construct(CurrencyRepository $repo)
    {
        parent::__construct($repo);
    }

}
