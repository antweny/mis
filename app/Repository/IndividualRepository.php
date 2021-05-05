<?php

namespace App\Repository;

use App\Models\Individual;
use App\Repositories\LocationRepository;
use App\Repository\Interfaces\IndividualRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;

class IndividualRepository extends BaseRepository implements IndividualRepositoryInterface
{
    /**
     * @var LocationRepository
     */
    protected $location;
    //private $excel;

    /**
     * IndividualRepository constructor.
     */
    public function __construct(Individual $model)
    {
        parent::__construct($model);
        //$this->location = new Location();
    }

    /*
     * Get
     */
    public function get()
    {
        return $this->model->with(['location','individual_group'])->withCount('participant')->paginate(500);
    }

    /*
     * Create new resource
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $individual = $this->model->create($request);
            $this->addGroupMember($individual,$request['individual_groups']);
            DB::commit();
            return true;
        }
        catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update specified resource
     */
    public function updating($id,$request)
    {
        $individual = $this->update($id,$request);

        if(isset($request['individual_groups'])) {
            return $this->updateGroupMember($individual,$request['individual_groups']);
        }
        return $this->detachGroupMember($individual);
    }

    /**
     * Add Individual to a group(s)
     */
    private function addGroupMember($individual, $members)
    {
        return $individual->individual_group()->attach($members);
    }

    /**
     * update Individual Group(s)
     */
    private function updateGroupMember($individual, $individual_groups)
    {
        return $individual->individual_group()->sync($individual_groups);
    }

    /*
     * Remove individual members
     */
    private function detachGroupMember($individual)
    {
        return $individual->individual_group()->detach();
    }


//    /**
//     * Get Model Collection with relationship
//     */
//    public function relationWith()
//    {
//        return $this->model->with(['location','individual_group'])->get()->sortBy('name');
//    }
//
//    /**
//     * Get event with relation and total participants
//     */
//    public function engagement()
//    {
//        return $this->withCountRelation(['location','individual_group'],['participant']);
//    }
//
//

//    /**
//     * Export Data
//     */
//    public function export($format)
//    {
//        return $this->excel->download(new IndividualExport,'individual.'.$format);
//    }

//    /**
//     * Import Organization List
//     */
//    public function import($request)
//    {
//        $file = $request->file('imported_file')->store('import/individual'); //Store Imported file to storage
//        $import = new IndividualImport; //Instance of Individual Import
//        $import->import($file);
//
//        if($import->failures()->isNotEmpty()) {
//            return $import->failures();
//        }
//        if($import->errors()->isNotEmpty()) {
//            return $import->errors();
//        }
//        return $import;
//    }





}
