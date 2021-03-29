<?php

namespace App\Repositories;

use App\Models\Asset;

class AssetRepository extends BaseRepository
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
            ])
            ->get();
    }






}
