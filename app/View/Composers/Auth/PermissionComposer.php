<?php

namespace App\View\Composers\Auth;

use App\View\Composers\BaseComposer;
use App\Repositories\Auth\PermissionRepository;
use Illuminate\View\View;

class PermissionComposer extends BaseComposer
{

    public function __construct(PermissionRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('permissions', $this->repo->selectNameAndId());
    }
}
