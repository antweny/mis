<?php

namespace App\View\Composers;

use App\Repositories\EmployeeRepository;
use Illuminate\View\View;

class CoordinatorComposer extends BaseComposer
{
    public function __construct(EmployeeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('coordinators',$this->repo->getActiveNameId());
    }

}
