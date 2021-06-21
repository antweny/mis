<?php

namespace App\Imports;

use App\Models\Individual;
use App\Models\Location;
use App\Rules\UniqueIndividualRule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Events\AfterImport;

class IndividualImport extends BaseImport
{
    private $location;

    /* Individual Import constructor.  */
    public function __construct()
    {
        $this->location = new Location();
    }

    /* Insert to model collection */
    public function model(array $row)
    {
        if(is_null($this->uniqueIndividual($row['name'],$row['mobile']))) {
            return new Individual([
                'name' => $row['name'],
                'sex' => $row['sex'],
                'email' => $row['email'],
                'mobile' => str_replace('-','',$row['mobile']),
                'age_group' => $row['age_group'],
                'occupation' => $row['occupation'],
                'location_id' => $this->location->findOrCreate($row['location']),
            ]);
        }
    }

    /* Check uniqueness of the Individual */
    private function uniqueIndividual($name,$mobile)
    {
        return Individual::uniqueIndividual($name,$mobile);
    }

   /* Validate Excel Column values */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:100',new UniqueIndividualRule],
            'mobile' => ['nullable','numeric'],
            'email' => ['nullable','string','max:255','unique:individuals,email'],
            'sex' => ['nullable','string'],
            'age_group' => ['nullable','string'],
            'occupation' => ['nullable','string'],
            'location'=>['nullable','string'],
            'group'=>['nullable','string'],
        ];
    }


}
