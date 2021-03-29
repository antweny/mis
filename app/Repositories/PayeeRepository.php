<?php

namespace App\Repositories;

use App\Models\Payee;

class PayeeRepository extends BaseRepository
{
    public function __construct(Payee $model)
    {
        parent::__construct($model);
    }

}
