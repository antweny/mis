<?php

namespace App\Repository;

use App\Models\Experience;
use App\Repository\Interfaces\IndividualExperienceRepositoryInterface;

class IndividualExperienceRepository extends BaseRepository implements IndividualExperienceRepositoryInterface
{

    public function __construct(Experience $model)
    {
        parent::__construct($model);
    }

    /*
     * Get Model
     */
    public function get()
    {
        return $this->model->with([
                'individual',
                'organization',
                'job_title',
                'location'])
            ->get();
    }






}
