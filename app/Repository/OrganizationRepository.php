<?php

namespace App\Repository;

use App\Models\Organization;
use App\Models\OrganizationGroup;
use App\Repository\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected $organizationGroup;

    /**
     * OrganizationRepository constructor.
     */
    public function __construct(Organization $model,OrganizationGroup $organizationGroup )
    {
        parent::__construct($model);
        $this->organizationGroup = $organizationGroup;
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->model->with(['location','organization_category'])->withCount(['experience'])->paginate();
    }


    /**
     * Get all Organization with Collection with relationship
     */
    public function getKCList()
    {
        return $this->model->where('organization_category_id',$this->organizationGroup->searchReturnId('name',self::KC_CATEGORY))
            ->with(['location','organization_category'])
            ->withCount('experience')
            ->get();
    }





}
