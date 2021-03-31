<?php

namespace App\Repository;

use App\Models\Project;
use App\Repository\Interfaces\ProjectRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Event with Relation
     */
    public function get()
    {
        return $this->model->with([
            'stakeholder'=>function($query){
                $query->with('organization')->get();
            },
            'coordinator',
        ])->get();
    }

    /*
     * Create new Outcome
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $project = $this->model->create($request);
            $this->addCoordinator($project, $request['coordinators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Updating the Outcome
     */
    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            $project = $this->update($id,$request);
            //Check if permission request has data
            $this->updateCoordinator($project, $request['coordinators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Manage Project Coordinator
     */
    private function addCoordinator($project, $request) : void
    {
        $project->coordinator()->attach($request);
    }

    private function updateCoordinator($project, $request) : void
    {
        $project->coordinator()->sync($request);
    }


}
