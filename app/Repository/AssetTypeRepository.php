<?php

namespace App\Repository;

use App\Models\AssetType;
use App\Repository\Interfaces\AssetTypeRepositoryInterface;

class AssetTypeRepository extends BaseRepository implements AssetTypeRepositoryInterface
{

    public function __construct(AssetType $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->relationshipWith(['parent']);
    }

}
