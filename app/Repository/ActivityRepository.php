<?php

namespace App\Repository;

use App\Models\Activity;
use App\Repository\Interfaces\ActivityRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;


class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{

    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    /*
     * Get list of Activities
     */
    public function get()
    {
        return $this->relationshipWith([
            'employee',
            'output',
            'project' =>function ($query) {
                $query->with('stakeholder')->get();
            }
        ]);
    }

//=> function($query) {
//    $query->with([
//        'stakeholder' => function ($query2) {
//            $query2->with('organization')->get();
//        }
//    ])->get();
//}
    /*
    * Create new Outcome
    */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $activity = $this->model->create($request);
            $this->addProject($activity, $request['projects']);
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
            $activity = $this->update($id,$request);
            //Check if permission request has data
            $this->updateproject($activity, $request['projects']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /**
     * Manage activity project
     */
    private function addProject($activity, $request) : void
    {
        $activity->project()->attach($request);
    }

    private function updateProject($activity, $request) : void
    {
        $activity->project()->sync($request);
    }

}
