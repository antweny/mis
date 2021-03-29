<?php

namespace App\Repository;

use App\Models\Role;
use App\Repository\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Role Repository constructor.
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }






}
