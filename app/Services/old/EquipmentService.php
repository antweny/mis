<?php

namespace App\Services;

use App\Repositories\EquipmentRepository;

class EquipmentService extends BaseService
{
    public function __construct(EquipmentRepository $repo)
    {
        parent::__construct($repo);
    }

}
