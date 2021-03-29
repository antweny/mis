<?php

namespace App\Services;

use App\Imports\OrganizationImport;
use App\Repositories\OrganizationRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class OrganizationService extends BaseService
{
    private $location;
    private $category;

    public function __construct(OrganizationRepository $repo, LocationService $location, OrganizationCategoryService $category)
    {
        parent::__construct($repo);
        $this->location = $location;
        $this->category = $category;
    }

    /**
     * Get list of all Organizations with Relation
     */
    public function relationWith()
    {
        return $this->repo->relationWith();
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $request['location_id'] = $this->location->getId($request['place']);
            $request['organization_category_id'] = $this->category->getId($request['org_category']);
            $this->repo->create($request);
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update existing resource
     */
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            $request['location_id'] = $this->location->getId($request['place']);
            $request['organization_category_id'] = $this->category->getId($request['org_category']);
            $this->repo->updateData($id,$request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Import Organization List
     */
    public function import($request)
    {
        try {
            $file = $request->file('imported_file')->store('import/organization'); //Store Imported file to storage
            $import = new OrganizationImport; //Instance of Individual Import
            $import->import($file);
            if($import->failures()->isNotEmpty()) {
                return $import->failures();
            }
            return true;
        }
        catch (\Exception $e) {
            error_log($e);
            throw $e;
        }
    }

    /**
     * Get Model Collection with relationship
     */
    public function category($cat)
    {
        return $this->repo->category($cat);
    }

    /**
     * Get all organization with KC Category
     */
    public function getKCList()
    {
        return $this->repo->getKCList();
    }


}
