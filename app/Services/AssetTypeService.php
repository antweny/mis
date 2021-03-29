<?php

namespace App\Services;

use App\Repositories\AssetTypeRepository;

class AssetTypeService extends BaseService
{
    public function __construct(AssetTypeRepository $repo)
    {
        parent::__construct($repo);
    }

}
