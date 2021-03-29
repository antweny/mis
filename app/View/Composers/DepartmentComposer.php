<?php

namespace App\View\Composers;

use App\Repositories\DepartmentRepository;
use Illuminate\View\View;

class DepartmentComposer extends BaseComposer
{

    public function __construct(DepartmentRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('departments',$this->repo->selectNameAndId());
    }


}
