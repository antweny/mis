<?php

namespace App\Services;

use App\Repositories\OutcomeRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class OutcomeService extends BaseService
{
    public function __construct(OutcomeRepository $repo)
    {
        parent::__construct($repo);
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $outcome = $this->repo->create($request);
            //Check if permission request has data
            $this->repo->addIndicator($outcome, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            error_log($e);
            throw $e;
        }
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $outcome = $this->repo->update($id,$request);
            //Check if permission request has data
            $this->repo->updateIndicator($outcome, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            error_log($e);
            throw $e;
        }
    }

}
