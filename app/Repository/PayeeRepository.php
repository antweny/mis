<?php

namespace App\Repository;

use App\Models\Payee;
use App\Repository\Interfaces\PayeeRepositoryInterface;

class PayeeRepository extends BaseRepository implements PayeeRepositoryInterface
{
    public function __construct(Payee $model)
    {
        parent::__construct($model);
    }

}
