<?php

namespace App\Repositories;

use App\Models\Designation;

class DesignationRepository extends BaseRepository
{
    /**
     * Department Repository constructor.
     */
    public function __construct(Designation $model)
    {
        parent::__construct($model);
    }




}
