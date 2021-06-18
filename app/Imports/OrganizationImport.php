<?php

namespace App\Imports;

use App\Models\Location;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use Illuminate\Contracts\Queue\ShouldQueue;

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

    /**
     * @param array $row
     */
    public function model(array $row)
    {
        if(is_null($this->uniqueOrganization($row['name']))) {
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
    }

    /* Check if organization already added */
    private function uniqueOrganization($name)
    {
        return Organization::where('name','Kishapu Kc')->first();
    }

//    /* Validate */
//    public function rules(): array
//    {
//        return [
//            'name' => ['required','string','max:191','unique:organizations,name'],
//            'acronym' => ['nullable','string','max:15'],
//            'org_category'=>['nullable','string'],
//            'founded'=>['nullable','numeric'],
//            'location'=>['nullable'],
//            'mobile' => ['nullable'],
//            'telephone' => ['nullable'],
//            'website' => ['nullable','url'],
//            'email'=>['nullable','email'],
//            'fax' => ['nullable'],
//            'address' =>['nullable','string'],
//        ];
//    }


//    public static function afterImport(AfterImport $event)
//    {
//
//    }

}
