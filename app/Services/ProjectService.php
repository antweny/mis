<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\DB;

class ProjectService extends BaseService
{
    public function __construct(ProjectRepository $repo)
    {
        parent::__construct($repo);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $project = $this->repo->create($request);
            $this->repo->coordinator($project,$request['coordinators']);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $project = $this->find($id); //Find the Event
            $this->repo->update($id, $request); //Binding the request to project model attributes
            $this->repo->coordinator($project,$request['coordinators'],'update');
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


}
