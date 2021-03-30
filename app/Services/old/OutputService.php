<?php

namespace App\Services;

use App\Repositories\OutputRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class OutputService extends BaseService
{
    public function __construct(OutputRepository $repo)
    {
        parent::__construct($repo);
    }

    public function withRelation()
    {
        return $this->repo->withRelation();
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $output = $this->repo->create($request);
            //Check if permission request has data
            $this->repo->addIndicator($output, $request['indicators']);
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
            $output = $this->repo->update($id,$request);
            //Check if permission request has data
            $this->repo->updateIndicator($output, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

}
