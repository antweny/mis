<?php

namespace App\Imports;

use App\Models\Location;
use App\Models\Organization;
use App\Models\OrganizationCategory;

class OrganizationImport extends BaseImport
{
    private $category;

    private $location;

    /* Organization Import constructor. */
    public function __construct()
    {
        $this->category = new OrganizationCategory;
        $this->location = new Location;
    }

    /* array $row */
    public function model(array $row)
    {
        return new Organization([
            'name' => $row['name'],
            'acronym' => $row['acronym'],
            'founded' => $row['founded'],
            'organization_category_id' => $this->category->findOrCreate($row['category']),
            'location_id' => $this->location->findOrCreate($row['location']),
            'mobile' => $row['mobile'],
            'email' => $row['email'],
            'website' => $row['website'],
            'fax' => $row['fax'],
            'address' => $row['address'],
            'desc' => $row['descriptions'],
        ]);
    }

    /* Validation Process */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:191','unique:organizations,name'],
            'acronym' => ['nullable','string','max:15'],
            'founded'=>['nullable','numeric'],
            'category'=>['nullable','string'],
            'location'=>['nullable'],
            'mobile' => ['nullable'],
            'email'=>['nullable','email'],
            'website' => ['nullable','url'],
            'fax' => ['nullable'],
            'address' =>['nullable','string'],
            'descriptions' => ['nullable'],
        ];
    }


}
