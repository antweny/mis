<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository extends BaseRepository
{
    /**
     * Location Repository constructor.
     */
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->getWithRelation(['parent']);
    }
}
