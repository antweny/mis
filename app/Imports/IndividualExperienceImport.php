<?php

namespace App\Imports;

use App\Models\Experience;
use App\Models\Individual;
use App\Models\JobTitle;
use App\Models\Location;
use App\Models\Organization;

class IndividualExperienceImport extends BaseImport
{

    private $jobTitle;
    private $organization;
    private $location;


    /* Experience Import constructor. */
    public function __construct()
    {
        $this->jobTitle = new JobTitle;
        $this->organization = new Organization;
        $this->location = new Location;
    }

    public function model(array $row)
    {
        return new Experience([
            'individual_id' => $this->uniqueIndividual($row['full_name'],$row['mobile']),
            'job_title_id' => $this->jobTitle->findOrCreate($row['title']),
            'organization_id' =>$this->organization->findOrCreate($row['organization']),
            'location_id' => $this->location->findOrCreate($row['location']),
            'descriptions' => $row['descriptions'],
        ]);
    }

    /* Check uniqueness of the Individual */
    private function uniqueIndividual($name,$mobile)
    {
        return Individual::uniqueIndividual($name,$mobile);
    }

    /* import file column validation */
    public function rules(): array
    {
        return [
            'full_name' => ['required','string','max:100'],
            'mobile' => ['nullable'],
            'title' => ['nullable','string'],
            'organization' => ['nullable','string'],
            'acronym' => ['nullable','string'],
            'location' => ['nullable','string'],
            'descriptions' => ['nullable','string'],
        ];
    }
}
