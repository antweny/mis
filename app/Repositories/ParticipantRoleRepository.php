<?php

namespace App\Repositories;

use App\Models\ParticipantRole;

class ParticipantRoleRepository extends BaseRepository
{
    public function __construct(ParticipantRole $model)
    {
        parent::__construct($model);
    }

}
