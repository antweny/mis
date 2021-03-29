<?php

namespace App\View\Composers;

use App\Repositories\IndividualGroupRepository;
use Illuminate\View\View;

class IndividualGroupComposer extends BaseComposer
{
    public function __construct(IndividualGroupRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('individualGroups', $this->repo->selectNameAndId());
    }

}
