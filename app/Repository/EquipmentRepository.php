<?php

namespace App\Repository;

use App\Models\Equipment;
use App\Repository\Interfaces\EquipmentRepositoryInterface;

class EquipmentRepository extends BaseRepository implements EquipmentRepositoryInterface
{
    public function __construct(Equipment $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Equipments List
     */
    public function get()
    {
        return $this->relationshipWith(['brand','asset_type']);
    }

    public function getEquipments()
    {
        return $this->model->select('id','brand_id','model')->with('brand')->get();
    }


}
