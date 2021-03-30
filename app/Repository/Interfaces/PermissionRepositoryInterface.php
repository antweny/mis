<?php

namespace App\Repository\Interfaces;

interface PermissionRepositoryInterface extends BaseRepositoryInterface
{

    public function updating($id, array $attributes);


}
