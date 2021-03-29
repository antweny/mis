<?php

namespace App\Imports;

use App\Models\Experience;
use App\Models\Individual;
use App\Models\JobTitle;
use App\Models\Organization;
use App\Models\Location;

class ExperienceImport extends BaseImport
{
    private $jobTitle;
    private $organization;
    private $individual;
    private $location;
    private $experience;

    /**
     * ExperienceImport constructor.
     */
    public function __construct()
    {
      $this->jobTitle = new JobTitle;
      $this->organization = new Organization;
      $this->individual = new Individual;
      $this->location = new Location;
      $this->experience = new Experience;
    }

    /**
     * @param array $row
     */
    public function model(array $row)
    {
        $individual = $this->individual->returnIndividualID($row['name'],$row['mobile']);
        $title = $this->jobTitle->findOrCreate($row['title']);
        $organization = $this->organization->findOrCreate($row['organization']);

        $experience = $this->experience->duplicateExperience($individual,$organization,$title);
        if(!$experience) {
            return new Experience([
                'individual_id' => $individual,
                'job_title_id' => $title,
                'organization_id' => $organization,
                'location_id' => $this->location->findOrCreate($row['location']),
            ]);
        }


    }

    /*
     * Sometimes you might want to validate each row before it's inserted into the database.
     * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:100'],
            'mobile' => ['nullable'],
            'organization' => ['nullable','string'],
            'title' => ['nullable','string'],
            'location' => ['nullable','string'],
        ];
    }
}
