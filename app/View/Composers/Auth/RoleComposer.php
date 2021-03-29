<?php

namespace App\View\Composers\Auth;

use App\View\Composers\BaseComposer;
use App\Repositories\Auth\RoleRepository;
use Illuminate\View\View;

class RoleComposer extends BaseComposer
{
    public function __construct(RoleRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('roles', $this->repo->selectNameAndId());
    }

}
