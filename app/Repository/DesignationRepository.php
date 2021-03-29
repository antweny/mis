<?php

namespace App\Repository;

use App\Models\Designation;
use App\Repository\Interfaces\DesignationRepositoryInterface;

class DesignationRepository extends BaseRepository implements DesignationRepositoryInterface
{
    /**
     * Designation Repository constructor.
     */
    public function __construct(Designation $model)
    {
        parent::__construct($model);
    }

}
