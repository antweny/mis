<?php

namespace App\Services;

use App\Imports\ParticipantImport;
use App\Repositories\ParticipantRepository;
use Illuminate\Support\Facades\DB;

class ParticipantService extends BaseService
{
    private $location;

    public function __construct(ParticipantRepository $repo, LocationService $location)
    {
        parent::__construct($repo);
        $this->location = $location;
    }

    /**
     * Get All Participants
     */
    public function getAll($event)
    {
        if(is_null($event)) {
            return $this->withRelation();
        }
        else {
            return $this->eventParticipants($event);
        }
    }


    /**
     * Get all Events Participants
     */
    public function withRelation()
    {
        return $this->repo->relationWith();
    }

    /**
     * Create New Location
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $this->repo->create($request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update existing role
     */
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
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
     * Get all Events Participants
     */
    public function getGroupBy()
    {
        return $this->repo->getGroupByDate();
    }

    /**
     * Get all Events Participants
     */
    public function eventParticipants($event)
    {
        return $this->repo->eventParticipants($event);
    }

    /**
     * Get all Events Participants
     */
    public function individualEngagement($individual)
    {
        return $this->repo->individualEngagement($individual);
    }


    /**
     * Import Participant List
     */
    public function import($request)
    {
        $file = $request->file('imported_file')->store('import/participant'); //Store Imported file to storage
        $import = new ParticipantImport; //Instance of Individual Import
        $import->import($file);
        if($import->failures()->isNotEmpty()) {
            return $import->failures();
        }
        if($import->errors()->isNotEmpty()) {
            return $import->errors();
        }
        return true;
    }
}
