<?php

namespace App\Services;

use App\Repositories\GenderSeriesParticipantRepository;

class GenderSeriesParticipantService extends BaseService
{
    public function __construct(GenderSeriesParticipantRepository $repo)
    {
        parent::__construct($repo);
    }

}
