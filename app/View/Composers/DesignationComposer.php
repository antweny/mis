<?php

namespace App\View\Composers;

use App\Repositories\DesignationRepository;
use Illuminate\View\View;

class DesignationComposer extends BaseComposer
{
    public function __construct(DesignationRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('designations',$this->repo->selectNameAndId());
    }



}
