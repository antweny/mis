<?php

namespace App\Repository;

use App\Models\ResourcePeople;
use App\Repository\Interfaces\ResourcePeopleRepositoryInterface;

class ResourcePeopleRepository extends BaseRepository implements ResourcePeopleRepositoryInterface
{
    public function __construct(ResourcePeople $model)
    {
        parent::__construct($model);
    }

    /*
     * Get Resource People List
     */
    public function get()
    {
       return $this->relationshipWith(['individual','individual_group']);
    }

}
