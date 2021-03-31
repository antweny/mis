<?php

namespace App\Repository;

use App\Models\Output;
use App\Repository\Interfaces\OutputRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class OutputRepository extends BaseRepository implements OutputRepositoryInterface
{

    /**
     * Output Repository constructor.
     */
    public function __construct(Output $model)
    {
        parent::__construct($model);
    }

    /*
     * Get Output with Outcomes and Indicators
     */
    public function get()
    {
        return $this->relationshipWith(['outcome','indicator']);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $output = $this->model->create($request);
            $this->addIndicator($output, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Updating the Output
     */
    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            $output = $this->update($id,$request);
            $this->updateIndicator($output, $request['indicators']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /*
     * Add Indicators
     */
    private function addIndicator($output, $indicators)
    {
        return $output->indicator()->attach($indicators);
    }

    /*
     * Update Indicators
     */
    private function updateIndicator($output, $indicators)
    {
        return $output->indicator()->sync($indicators);
    }

}
