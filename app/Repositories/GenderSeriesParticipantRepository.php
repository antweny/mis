<?php

namespace App\Repositories;

use App\Models\GenderSeriesParticipant;

class GenderSeriesParticipantRepository extends BaseRepository
{

    public function __construct(GenderSeriesParticipant $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with([
                'individual',
                'organization',
                'gender_series',
                'location',
                'participant_role',
                'individual_group'
            ])->get();
    }


}
