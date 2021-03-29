<?php

namespace App\Services;

use App\Repositories\VisitorRepository;


class VisitorService extends BaseService
{
    public function __construct(VisitorRepository $repo)
    {
        parent::__construct($repo);
    }

    public function withRelation()
    {
        return $this->repo->withRelation();
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        $request['location_id'] = $this->repo->locationId($request['place']);
        $request['organization_id'] = $this->repo->organizationID($request['company']);
        return $this->repo->create($request);
    }


}
