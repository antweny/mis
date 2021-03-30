<?php

namespace App\Services;

use App\Repositories\BankRepository;

class BankService extends BaseService
{
    public function __construct(BankRepository $repo)
    {
        parent::__construct($repo);
    }

    public function get()
    {
        return $this->repo->get();
    }

}
