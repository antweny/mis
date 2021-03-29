<?php

namespace App\Repositories;

use App\Models\AssetType;

class AssetTypeRepository extends BaseRepository
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
        return $this->getWithRelation(['parent']);
    }

}
