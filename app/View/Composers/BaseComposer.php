<?php

namespace App\View\Composers;

use App\Repositories\BaseRepository;

class BaseComposer
{
    protected $repo;

    public function __construct(BaseRepository $repo)
    {
        $this->repo = $repo;
    }

}
