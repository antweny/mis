<?php

namespace App\Repository;

use App\Models\Brand;
use App\Repository\Interfaces\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

}
