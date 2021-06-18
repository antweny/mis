<?php

namespace App\Repository;

use App\Exports\Organization\OrganizationsExport;
use App\Imports\OrganizationImport;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Repository\Interfaces\OrganizationRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    protected $organizationCategory;

    protected $experience;

    /**
     * OrganizationRepository constructor.
     */
    public function __construct(Organization $model,OrganizationCategory $organizationCategory )
    {
        parent::__construct($model);
        $this->organizationCategory = $organizationCategory;
        $this->experience = new Experience;
    }

    /*  Get Model Collection with relationship */
    public function get()
    {
        return $this->model->with(['location','organization_category'])->withCount(['experience'])->get();
    }

    /* Get Collection with pagination */
    public function paginate($int = 25)
    {
        return $this->model->with(['location','organization_category'])->withCount(['experience'])->paginate($int);
    }

    /* Get all Organization with Collection with relationship */
    public function getOrganisationListByCategory($name)
    {
        return $this->model->where('organization_category_id',$this->organizationCategory->searchReturnId('name',$name))
            ->with(['location','organization_category'])
            ->withCount('experience')
            ->get();
    }

    /* Export Data */
    public function export($format)
    {
        $extension = strtolower($format);

        if (in_array($format,['Mpdf','Dompdf','Tcpdf'])) $extension = 'pdf';

        return Excel::download(new OrganizationsExport(),'organizations.'.$extension,$format);
    }

    /* Import Organization List  */
    public function import($request)
    {
        $file = $request->file('import_file')->store('imports/organizations');
        $import = new OrganizationImport();
        $import->import($file);

        if($import->failures()->isNotEmpty()) {
            return $import->failures();
        }
        if($import->errors()->isNotEmpty()) {
            return $import->errors();
        }
        return $import;

//        foreach ($import->failures() as $failure) {
//            $failure->row(); // row that went wrong
//            $failure->attribute(); // either heading key (if using heading row concern) or column index
//            $failure->errors(); // Actual error messages from Laravel validator
//            $failure->values(); // The values of the row that has failed.
//        }



//        try {
//            $file = $request->file('import_file')->store('imports/organizations');
//            $import = new OrganizationImport();
//            $import->import($file);
//            return Excel::import(new OrganizationImport(),$file);
//        } catch (\InvalidArgumentException $e) {
//            throw  $e;
//        } catch (\Exception $e) {
//            throw  $e;
//        } catch (\Error $e) {
//            throw  $e;
//        }

    }


}
