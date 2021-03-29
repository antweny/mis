<?php

namespace App\View\Composers;

use App\Repositories\EmployeeRepository;
use Illuminate\View\View;

class ManagerComposer extends BaseComposer
{
    public function __construct(EmployeeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('managers',$this->repo->isActive());
    }

}
