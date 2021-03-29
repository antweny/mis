<?php

namespace App\View\Composers;

use App\Repositories\StakeholderRepository;
use Illuminate\View\View;

class StakeholderComposer extends BaseComposer
{

    public function __construct(StakeholderRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('stakeholders', $this->repo->getBank());
    }

}
