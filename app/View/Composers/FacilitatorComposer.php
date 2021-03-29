<?php

namespace App\View\Composers;

use App\Repositories\IndividualRepository;
use Illuminate\View\View;

class FacilitatorComposer extends BaseComposer
{

    public function __construct(IndividualRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('facilitators', $this->repo->pluckNameId());
    }

}
