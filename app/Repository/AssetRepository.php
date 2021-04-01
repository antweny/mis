<?php

namespace App\Repository;

use App\Models\Asset;
use App\Repository\Interfaces\AssetRepositoryInterface;

class AssetRepository extends BaseRepository implements AssetRepositoryInterface
{
    public function __construct(Asset $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with([
                'equipment'=>function($query){
                return $query->with(['brand','asset_type'])->get();
                },
                'item_unit'
            ])->get();
    }






}
