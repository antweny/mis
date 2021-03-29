<?php

namespace App\Repositories;

use App\Models\Location;
use App\Models\Organization;
use App\Models\Visitor;

class VisitorRepository extends BaseRepository
{
    protected $location;
    protected $organization;
    protected $individual;


    public function __construct(Visitor $model)
    {
        parent::__construct($model);
        $this->location = new Location;
        $this->organization = new Organization;
    }

    public function withRelation()
    {
        return $this->getWithRelation(['individual','location','organization','employee']);
    }

    /**
     * Get Model Relation resource ID
     */
    public function locationID($data)
    {
        return $this->location->findOrCreate($data);
    }

    /**
     * Get Model Relation resource ID
     */
    public function organizationID($data)
    {
        return $this->organization->findOrCreate($data);
    }

}
