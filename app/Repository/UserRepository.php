<?php

namespace App\Repository;

use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }






}
