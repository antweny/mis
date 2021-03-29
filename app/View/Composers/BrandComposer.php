<?php

namespace App\View\Composers;

use App\Repositories\BrandRepository;
use Illuminate\View\View;

class BrandComposer extends BaseComposer
{

    public function __construct(BrandRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('brands', $this->repo->selectNameAndId());
    }

}
