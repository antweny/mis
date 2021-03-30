<?php

namespace App\View\Composers;

use App\Repositories\OrganizationRepository;
use Illuminate\View\View;

class OrganiserComposer extends BaseComposer
{
    public function __construct(OrganizationRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('organizations', $this->repo->pluckNameId());
    }

}
