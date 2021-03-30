<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\BankAccountRepository;

class BankAccountService extends BaseService
{
    public function __construct(BankAccountRepository $repo)
    {
        parent::__construct($repo);
    }

    public function get()
    {
        return $this->repo->get();
    }

}
