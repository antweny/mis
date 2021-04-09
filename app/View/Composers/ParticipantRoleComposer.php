<?php

namespace App\View\Composers;

use App\Models\ParticipantRole;
use Illuminate\View\View;

class ParticipantRoleComposer extends BaseComposer
{
    public function __construct(ParticipantRole $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('participantRoles', $this->model->selectNameID());
    }

}
