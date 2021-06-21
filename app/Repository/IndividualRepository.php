<?php

namespace App\Repository;

use App\Exports\Individual\IndividualsExport;
use App\Imports\IndividualImport;
use App\Imports\OrganizationImport;
use App\Models\Individual;
use App\Repository\Interfaces\IndividualRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class IndividualRepository extends BaseRepository implements IndividualRepositoryInterface
{
    /*  Location  */
    protected $location;

    /* IndividualRepository constructor. */
    public function __construct(Individual $model)
    {
        parent::__construct($model);
    }

    /* Get all individuals with relationship */
    public function get()
    {
        return $this->model->with(['location','individual_group'])->withCount('participant')->get();
    }

    /* Get Collection with pagination */
    public function paginate($int = 25)
    {
        return $this->model->with(['location','individual_group'])->withCount('participant')->paginate($int);
    }

    /* Create new resource */
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

    /* Update specified resource */
    public function updating($id,$request)
    {
        $individual = $this->update($id,$request);

        if(isset($request['individual_groups'])) {
            return $this->updateGroupMember($individual,$request['individual_groups']);
        }
        return $this->detachGroupMember($individual);
    }

    /* Add Individual to a group(s) */
    private function addGroupMember($individual, $members)
    {
        return $individual->individual_group()->attach($members);
    }

    /*  update Individual Group(s) */
    private function updateGroupMember($individual, $individual_groups)
    {
        return $individual->individual_group()->sync($individual_groups);
    }

    /*  Remove individual members */
    private function detachGroupMember($individual)
    {
        return $individual->individual_group()->detach();
    }

    /* Export Data */
    public function export($format)
    {
        $extension = strtolower($format);

        if (in_array($format,['Mpdf','Dompdf','Tcpdf'])) $extension = 'pdf';

        return Excel::download(new IndividualsExport(),'individuals.'.$extension,$format);
    }

    /* Import Data  */
    public function import($request)
    {
        $file = $request->file('import_file')->store('imports/individuals');
        $import = new IndividualImport();
        $import->import($file);
        return $import;
    }

}
