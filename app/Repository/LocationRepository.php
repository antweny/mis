<?php

namespace App\Repository;

use App\Models\Location;
use App\Repository\Interfaces\LocationRepositoryInterface;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    /**
     * Location Repository constructor.
     */
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    /**
     *
     */
    public function get()
    {
        return $this->relationshipWith(['parent']);
    }

//    /**
//     *
//     */
//    public function selectNameID()
//    {
//       return $this->model->selectNameID();
//    }


}
