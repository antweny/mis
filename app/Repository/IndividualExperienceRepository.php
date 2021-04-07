<?php

namespace App\Repository;

use App\Models\Experience;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Repository\Interfaces\IndividualExperienceRepositoryInterface;

class IndividualExperienceRepository extends BaseRepository implements IndividualExperienceRepositoryInterface
{

    protected $organizationCategory;
    protected $organization;

    /**
     * Individual Experience Repository constructor.
     */
    public function __construct(Experience $model,OrganizationCategory $organizationCategory, Organization $organization)
    {
        parent::__construct($model);
        $this->organization = $organization;
        $this->organizationCategory = $organizationCategory;
    }

    /*
     * Get Model
     */
    public function get()
    {
        return $this->model->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }

    /**
     * Get List of KC Members
     */
    public function organizationMembersList($catValue)
    {
        return $this->model
            ->whereIn('organization_id',$this->getAllOrganizationBelongsToCategory($this->getOrganizationCategoryID($catValue)))
            ->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }

    /*
     * Get category ID
     */
    private function getOrganizationCategoryID($catValue)
    {
        return $this->organizationCategory->searchReturnID('name',$catValue);
    }

    /*
     * Get ID array of organization belongs to category
     */
    private function getAllOrganizationBelongsToCategory($categoryID)
    {
        return $this->organization->searchReturnArrayId('organization_category_id',$categoryID);
    }

    /*
     * Get members by organizations
     */
    public function membersByOrganization($data)
    {
        $organization = $this->organization->find($this->decode($data));
        return $this->model->where('organization_id',$organization->id)->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }
}
