<?php

namespace App\Repository;

use App\Models\Organization;
use App\Repository\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{

    /**
     * OrganizationRepository constructor.
     */
    public function __construct(Organization $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Model Collection with relationship
     */
    public function get()
    {
        return $this->model->with(['location','organization_category'])->withCount(['experience'])->paginate();
    }

//    /**
//     * Get Model Collection based on organization category
//     */
//    public function category($cat)
//    {
//        $category = $this->category->select('id')->where('name',$cat)->first();
//        return $this->model
//            ->with(['location','organization_category'])
//            ->where('organization_category_id',$category->id)
//            ->get();
//    }


//    /**
//     * Get all Organization with Collection with relationship
//     */
//    public function getKCList()
//    {
//        return $this->model->where('organization_category_id',$this->category->searchByNameReturnId(self::KC_CATEGORY))
//            ->with(['location','organization_category'])
//            ->withCount('experience')
//            ->get();
//    }





}
