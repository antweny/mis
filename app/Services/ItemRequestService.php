<?php

namespace App\Services;

use App\Repositories\ItemRequestRepository;

class ItemRequestService extends  BaseService
{
    public function __construct(ItemRequestRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function get($id = null)
    {
       return $this->repo->getUserData($id);
    }

}
