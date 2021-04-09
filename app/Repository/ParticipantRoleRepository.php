<?php

namespace App\Repository;

use App\Models\ParticipantRole;
use App\Repository\Interfaces\ParticipantRoleRepositoryInterface;

class ParticipantRoleRepository extends BaseRepository implements ParticipantRoleRepositoryInterface
{
    public function __construct(ParticipantRole $model)
    {
        parent::__construct($model);
    }







}
