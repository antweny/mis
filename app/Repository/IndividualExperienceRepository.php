<?php

namespace App\Repository;

use App\Exports\Individual\ExperienceExport;
use App\Imports\IndividualExperienceImport;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Repository\Interfaces\IndividualExperienceRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;

class IndividualExperienceRepository extends BaseRepository implements IndividualExperienceRepositoryInterface
{

    protected $organizationCategory;
    protected $organization;

    /* Individual Experience Repository constructor. */
    public function __construct(Experience $model,OrganizationCategory $organizationCategory, Organization $organization)
    {
        parent::__construct($model);
        $this->organization = $organization;
        $this->organizationCategory = $organizationCategory;
    }

    /* Get Collection */
    public function get()
    {
        return $this->model->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }

    /* Get Collection with pagination */
    public function paginate($int = 50)
    {
        return $this->model->with([ 'individual', 'organization', 'job_title', 'location'])->paginate($int);
    }

    /* Get List of KC Members */
    public function organizationMembersList($catValue)
    {
        return $this->model
            ->whereIn('organization_id',$this->getAllOrganizationBelongsToCategory($this->getOrganizationCategoryID($catValue)))
            ->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }

    /* Get category ID */
    private function getOrganizationCategoryID($catValue)
    {
        return $this->organizationCategory->searchReturnID('name',$catValue);
    }

    /* Get ID array of organization belongs to category */
    private function getAllOrganizationBelongsToCategory($categoryID)
    {
        return $this->organization->searchReturnArrayId('organization_category_id',$categoryID);
    }

    /* Get members by organizations */
    public function membersByOrganization($data)
    {
        $organization = $this->organization->find($this->decode($data));
        return $this->model->where('organization_id',$organization->id)->with([ 'individual', 'organization', 'job_title', 'location'])->get();
    }

    /* Export Data */
    public function export($format)
    {
        $extension = strtolower($format);

        if (in_array($format,['Mpdf','Dompdf','Tcpdf'])) $extension = 'pdf';

        return Excel::download(new ExperienceExport(),'experiences.'.$extension,$format);
    }

    /* Import Data  */
    public function import($request)
    {
        $file = $request->file('import_file')->store('imports/individuals/experiences');
        $import = new IndividualExperienceImport();
        $import->import($file);
        return $import;
    }
}
