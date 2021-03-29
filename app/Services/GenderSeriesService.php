<?php

namespace App\Services;

use App\Repositories\GenderSeriesRepository;
use Illuminate\Support\Facades\DB;

class GenderSeriesService extends BaseService
{
    public function __construct(GenderSeriesRepository $repo)
    {
        parent::__construct($repo);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $gender = $this->repo->create($request);
            $this->repo->facilitator($gender,$request['facilitators']);
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
            $gender = $this->repo->updateData($id, $request);
            $this->repo->facilitator($gender,$request['facilitators'],'update');
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


}
