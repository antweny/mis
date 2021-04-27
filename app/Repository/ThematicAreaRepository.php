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

    /* Get Thematic Areas and Fields List with parent */
    public function get()
    {
        return $this->relationshipWith(['parent']);
    }

    /**
     * Get Parents Only
     */
    public function parentOnly()
    {
        return $this->model->parentOnly();
    }


}
