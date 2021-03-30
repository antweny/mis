<?php

namespace App\Repository\Interfaces;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function updating($id, array $attributes);

}
