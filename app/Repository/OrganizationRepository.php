<?php

namespace App\Repository;

use App\Models\Experience;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\OrganizationGroup;
use App\Repository\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected $organizationCategory;
    protected $experience;

    /**
     * OrganizationRepository constructor.
     */
    public function __construct(Organization $model,OrganizationCategory $organizationCategory )
    {
        parent::__construct($model);
        $this->organizationCategory = $organizationCategory;
        $this->experience = new Experience;
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
    public function getOrganisationListByCategory($name)
    {
        return $this->model->where('organization_category_id',$this->organizationCategory->searchReturnId('name',$name))
            ->with(['location','organization_category'])
            ->withCount('experience')
            ->get();
    }


}
