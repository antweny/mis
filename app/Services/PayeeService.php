<?php

namespace App\Services;

use App\Repositories\PayeeRepository;

class PayeeService extends BaseService
{
    public function __construct(PayeeRepository $repo)
    {
        parent::__construct($repo);
    }

}
