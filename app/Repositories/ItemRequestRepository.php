<?php

namespace App\Repositories;

use App\Models\ItemOut;

class ItemRequestRepository extends BaseRepository
{
    public function __construct(ItemOut $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all authenticated user items requests
     */
    public function getUserData($id)
    {
        return $this->model->where('employee_id',$id)->get();
    }


}
