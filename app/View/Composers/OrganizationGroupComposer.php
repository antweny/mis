<?php

namespace App\View\Composers;

use App\Repositories\OrganizationGroupRepository;
use Illuminate\View\View;

class OrganizationGroupComposer extends BaseComposer
{
    public function __construct(OrganizationGroupRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('organizationGroups', $this->repo->selectNameAndId());
    }

}
