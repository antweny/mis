<?php

namespace App\Repositories;

use App\Models\Equipment;

class EquipmentRepository extends BaseRepository
{
    public function __construct(Equipment $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->getWithRelation(['brand','asset_type']);
    }

    public function getEquipments()
    {
        return $this->model->select('id','brand_id','model')->with('brand')->get();
    }


}
