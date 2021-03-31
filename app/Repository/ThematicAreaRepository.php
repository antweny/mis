<?php

namespace App\Repository;

use App\Models\ThematicArea;
use App\Repository\Interfaces\ThematicAreaRepositoryInterface;

class ThematicAreaRepository extends BaseRepository implements ThematicAreaRepositoryInterface
{

    public function __construct(ThematicArea $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Parents Only
     */
    public function parentOnly()
    {
        return $this->model->parentOnly();
    }


}
