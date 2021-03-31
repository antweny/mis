<?php

namespace App\Repository;

use App\Models\Outcome;
use App\Repository\Interfaces\OutcomeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;

class OutcomeRepository extends BaseRepository implements OutcomeRepositoryInterface
{
    public function __construct(Outcome $model)
    {
        parent::__construct($model);
    }

    /*
     * Get Outcome list with Indicators
     */
    public function get()
    {
        return $this->relationshipWith(['indicator']);
    }

    /*
     * Create new Outcome
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $outcome = $this->model->create($request);
            //Check if permission request has data
            $this->addIndicator($outcome, $request['indicators']);
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
            $outcome = $this->update($id,$request);
            //Check if permission request has data
            $this->updateIndicator($outcome, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /*
     * Add Outcome Indicators
     */
    private function addIndicator($outcome, $indicators)
    {
        return $outcome->indicator()->attach($indicators);
    }

    /*
     * Update Outcome Indicators
     */
    private function updateIndicator($outcome, $indicators)
    {
        return $outcome->indicator()->sync($indicators);
    }
}
