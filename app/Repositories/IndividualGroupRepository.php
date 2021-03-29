<?php

namespace App\Repositories;

use App\Models\IndividualGroup;

class IndividualGroupRepository extends BaseRepository
{

    public function __construct(IndividualGroup $model)
    {
        parent::__construct($model);
    }


}
