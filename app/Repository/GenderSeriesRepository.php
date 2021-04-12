<?php

namespace App\Repository;

use App\Models\GenderSeries;
use App\Repository\Interfaces\GenderSeriesRepositoryInterface;
use Illuminate\Support\Facades\DB;

class GenderSeriesRepository extends BaseRepository implements GenderSeriesRepositoryInterface
{
    /**
     * Gender Series Repository constructor.
     */
    public function __construct(GenderSeries $model)
    {
        parent::__construct($model);
    }

    /*
     *
     */
    public function get()
    {
       return $this->relationshipWith(['facilitator','employee']);
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $gender = $this->model->create($request);
            $this->facilitator($gender,$request['facilitators']);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            $gender = $this->update($id, $request);
            $this->facilitator($gender,$request['facilitators'],true);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Manage Event Facilitator
     */
    private function facilitator($gender , $request, $update = null)
    {
        if(!is_null($gender)) {
            return $gender->facilitator()->sync($request);
        }
        else {
            return $gender->facilitator()->attach($request);
        }
    }


    /**
     * Get Gender series List
     */
    public function dropdownList()
    {
        return $this->model->select('id','topic','date')->orderBy('date','asc')->get();
    }

}
