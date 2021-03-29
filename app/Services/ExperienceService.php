<?php

namespace App\Services;

use App\Imports\ExperienceImport;
use App\Repositories\ExperienceRepository;
use Illuminate\Support\Facades\DB;

class ExperienceService extends BaseService
{
    private $location;
    private $title;
    private $organization;

    public function __construct(ExperienceRepository $repo,
                                LocationService $location,
                                JobTitleService $jobTitle,
                                OrganizationService $organization
    )
    {
        parent::__construct($repo);
        $this->location = $location;
        $this->title = $jobTitle;
        $this->organization = $organization;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->repo->withRelation($this->kcIds());
    }

    /**
     * Create new individual experience
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $request['location_id'] = $this->location->getId($request['place']);
            $request['job_title_id'] = $this->title->getId($request['heading']);
            $this->repo->create($request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Update existing role
     */
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            $request['location_id'] = $this->location->getId($request['place']);
            $request['job_title_id'] = $this->title->getId($request['heading']);
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
        $file = $request->file('imported_file')->store('import/experience'); //Store Imported file to storage
        $import = new ExperienceImport; //Instance of Individual Import
        $import->import($file);
        if($import->failures()->isNotEmpty()) {
            return $import->failures();
        }
        return true;
    }

    /**
     * Get all the members from the specific organization
     */
    public function organization($organization)
    {
        return $this->repo->getOrganizationExperienceMember($organization);
    }


    /**
     * Get List of all KC's Members List
     */
    public function getKCMembersList()
    {
        return $this->repo->getKCMembersList($this->kcIds());
    }

    /**
     * Return Array of ID's
     */
    private function kcIds()
    {
        return $this->organization->getKCList()->pluck('id');
    }






}
