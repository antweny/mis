<?php

namespace App\View\Composers;

use App\Repositories\OrganizationCategoryRepository;
use Illuminate\View\View;

class OrganizationCategoryComposer extends  BaseComposer
{

    public function __construct(OrganizationCategoryRepository $repo)
    {
        parent::__construct($repo);
    }


    public function compose(View $view)
    {
        $view->with('organizationCategories', $this->repo->orderBySortAsc());
    }

}
