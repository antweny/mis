<?php

namespace App\Repository;

use App\Models\GenderSeriesParticipant;
use App\Repository\Interfaces\GenderSeriesParticipantRepositoryInterface;

class GenderSeriesParticipantRepository extends BaseRepository implements GenderSeriesParticipantRepositoryInterface
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
