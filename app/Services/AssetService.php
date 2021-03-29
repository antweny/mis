<?php

namespace App\Services;

use App\Repositories\AssetRepository;

class AssetService extends BaseService
{
    public function __construct(AssetRepository $repo)
    {
        parent::__construct($repo);
    }
}
