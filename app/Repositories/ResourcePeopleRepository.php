<?php

namespace App\Repositories;

use App\Models\ResourcePeople;

class ResourcePeopleRepository extends BaseRepository
{
    public function __construct(ResourcePeople $model)
    {
        parent::__construct($model);
    }

    public function withRelation()
    {
       return $this->getWithRelation(['individual','individual_group']);
    }

}
