<?php

namespace App\Repositories;

use App\Models\JobTitle;

class JobTitleRepository extends BaseRepository
{
    /**
     * TitleRepository constructor.
     */
    public function __construct(JobTitle $model)
    {
        parent::__construct($model);
    }

    /**
     * Select Name,Acronym
     */
    public function selectNameIdAcronym()
    {
        return $this->model->selectNameIdAcronym();
    }

}
