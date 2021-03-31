<?php

namespace App\Repository;

use App\Models\OrganizationGroup;
use App\Models\Stakeholder;
use App\Repository\Interfaces\StakeholderRepositoryInterface;

class StakeholderRepository extends BaseRepository implements StakeholderRepositoryInterface
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
    public function get()
    {
        return $this->relationshipWith([
            'organization',
            'organization_group'
        ]);
    }

    public function getStakeholderByGroup($group)
    {
       return $this->model->where('organization_group_id',$this->organizationGroup->searchByNameReturnId($group))
            ->with('organization')
            ->get();
    }

}
