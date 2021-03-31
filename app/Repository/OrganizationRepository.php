<?php

namespace App\Repository;

use App\Interfaces\OrganizationInterface;
use App\Models\OrganizationCategory;
use App\Models\Organization;

class OrganizationRepository extends BaseRepository implements OrganizationInterface
{
    /**
     * @var LocationRepository
     */
    protected $category;

    /**
     * OrganizationRepository constructor.
     */
    public function __construct(Organization $model)
    {
        parent::__construct($model);
        $this->category = new OrganizationCategory;
    }

    /**
     * Get Model Collection with relationship
     */
    public function relationWith()
    {
        return $this->withCountRelation(['location','organization_category'],['experience']);
    }

    /**
     * Get Model Collection based on organization category
     */
    public function category($cat)
    {
        $category = $this->category->select('id')->where('name',$cat)->first();
        return $this->model
            ->with(['location','organization_category'])
            ->where('organization_category_id',$category->id)
            ->get();
    }

    /**
     * Update Data
     */
    public function updateData($id,$request)
    {
        return $this->update($id, $request);
    }

    /**
     * Get all Organization with Collection with relationship
     */
    public function getKCList()
    {
        return $this->model->where('organization_category_id',$this->category->searchByNameReturnId(self::KC_CATEGORY))
            ->with(['location','organization_category'])
            ->withCount('experience')
            ->get();
    }





}
