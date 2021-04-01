<?php

namespace App\Repository;

use App\Models\OrganizationGroup;
use App\Models\Stakeholder;
use App\Repository\Interfaces\BankRepositoryInterface;

class BankRepository extends BaseRepository implements BankRepositoryInterface
{
    protected $group;

    public function __construct(Stakeholder $model, OrganizationGroup $group)
    {
        parent::__construct($model);
        $this->group = $group;
    }

    /**
     * Get all Stakeholder belongs to bank group
     */
    public function get ()
    {
        return $this->model->where('organization_group_id',$this->group->searchReturnId('name','Bank'))
            ->with('organization_group','organization')
            ->get();
    }

}
