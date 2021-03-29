<?php

namespace App\View\Composers;

use App\Repositories\ParticipantRoleRepository;
use Illuminate\View\View;

class ParticipantRoleComposer extends BaseComposer
{
    public function __construct(ParticipantRoleRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('participantRoles', $this->repo->selectNameAndId());
    }

}
