<?php

namespace App\Imports;

use App\Models\Individual;
use App\Models\Location;

class IndividualImport extends  BaseImport
{
    protected $location;
    protected $individual;

    public function __construct()
    {
        $this->location = new Location;
        $this->individual = new Individual;
    }

    /**
     * @param array $row
     */
    public function model(array $row)
    {
        $individual = $this->individual->duplicateIndividual($row['name'],$row['mobile']);

        if(!$individual) {
            return new Individual([
                'name' => $row['name'],
                'sex' => $row['sex'],
                'mobile' => str_replace('-','',$row['mobile']),
                'age_group' => $row['age_group'],
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
            'sex' => ['nullable','string'],
            'age_group' => ['nullable','string'],
            'location'=>['nullable','string'],
            'mobile' => ['nullable','numeric'],
        ];
    }


}
