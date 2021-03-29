<?php

namespace App\Repositories;

use App\Models\ThematicArea;

class ThematicAreaRepository extends BaseRepository
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
