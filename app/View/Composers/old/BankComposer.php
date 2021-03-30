<?php

namespace App\View\Composers;

use App\Repositories\StakeholderRepository;
use Illuminate\View\View;

class BankComposer extends BaseComposer
{

    public function __construct(StakeholderRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('banks', $this->repo->getBank());
    }

}
