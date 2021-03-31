<?php

namespace App\Repositories;

use App\Models\OrganizationGroup;
use App\Models\Stakeholder;

class StakeholderRepository extends BaseRepository
{
    protected $organizationGroup;

    public function __construct(Stakeholder $model)
    {
        parent::__construct($model);
        $this->organizationGroup = new OrganizationGroup;
    }

    /**
     * Get Model Collection with relationship
     */
    public function relationWith()
    {
        return $this->getWithRelation([
            'organization',
            'organization_group'
        ]);
    }

    public function getBank()
    {
       return $this->model->where('organization_group_id',$this->organizationGroup->searchByNameReturnId('Bank'))
            ->with('organization')
            ->get();
    }

}
