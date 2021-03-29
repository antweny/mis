<?php

namespace App\View\Composers;

use App\Repositories\IndividualGroupRepository;
use Illuminate\View\View;

class MemberComposer extends BaseComposer
{
    public function __construct(IndividualGroupRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('individual_groups', $this->repo->pluckNameId());
    }

}
