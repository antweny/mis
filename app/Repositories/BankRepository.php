<?php

namespace App\Repositories;

use App\Models\OrganizationGroup;
use App\Models\Stakeholder;

class BankRepository extends BaseRepository
{
    protected $group;

    public function __construct(Stakeholder $model)
    {
        parent::__construct($model);
        $this->group = new OrganizationGroup;
    }

    /**
     * Get all Stakeholder belongs to bank group
     */
    public function get ()
    {
        return $this->model->where('organization_group_id',$this->group->searchByNameReturnId('Bank'))
            ->with('organization_group','organization')
            ->get();
    }


}
