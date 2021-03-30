<?php

namespace App\Services;

use App\Repositories\ThematicAreaRepository;

class ThematicAreaService extends BaseService
{

    public function __construct(ThematicAreaRepository $repo)
    {
        parent::__construct($repo);
    }


}
