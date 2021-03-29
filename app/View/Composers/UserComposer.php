<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class UserComposer extends BaseComposer
{
    public function __construct(UserRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('users',$this->repo->selectNameAndId());
    }

}
