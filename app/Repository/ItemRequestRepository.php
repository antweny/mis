<?php

namespace App\Repository;

use App\Models\ItemOut;
use App\Repository\Interfaces\ItemRequestRepositoryInterface;

class ItemRequestRepository extends BaseRepository implements ItemRequestRepositoryInterface
{
    public function __construct(ItemOut $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all authenticated user items requests
     */
    public function get($id = null)
    {
        return $this->model->where('employee_id',$id)->get();
    }


}
