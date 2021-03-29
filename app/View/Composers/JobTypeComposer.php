<?php

namespace App\View\Composers;

use App\Repositories\JobTypeRepository;
use Illuminate\View\View;

class JobTypeComposer extends BaseComposer
{

    public function __construct(JobTypeRepository $repo)
    {
        parent::__construct($repo);
    }


    public function compose(View $view)
    {
        $view->with('jobTypes', $this->repo->selectNameAndId());
    }

}
