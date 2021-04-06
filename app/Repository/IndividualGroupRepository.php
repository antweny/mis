<?php

namespace App\Repository;

use App\Models\IndividualGroup;
use App\Repository\Interfaces\IndividualGroupRepositoryInterface;

class IndividualGroupRepository extends BaseRepository implements IndividualGroupRepositoryInterface
{

    public function __construct(IndividualGroup $model)
    {
        parent::__construct($model);
    }

}
