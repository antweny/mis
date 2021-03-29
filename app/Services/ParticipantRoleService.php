<?php

namespace App\Services;

use App\Repositories\ParticipantRoleRepository;

class ParticipantRoleService extends BaseService
{
    public function __construct(ParticipantRoleRepository $repo)
    {
        parent::__construct($repo);
    }

}
