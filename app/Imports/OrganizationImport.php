<?php

namespace App\Imports;

use App\Models\Location;
use App\Models\Organization;
use App\Models\OrganizationCategory;
use Maatwebsite\Excel\Events\AfterImport;

class OrganizationImport extends BaseImport
{

    private $category;
    private $location;

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
        return new Organization([
            'name' => $row['name'],
            'founded' => $row['founded'],
            'organization_category_id' => $this->category->findOrCreate($row['category']),
            'mobile' => $row['mobile'],
            'email' => $row['email'],
            'website' => $row['website'],
            'address' =>$row['address'],
            'location_id' => $this->location->findOrCreate($row['location']),
        ]);
    }

    /*
    * Sometimes you might want to validate each row before it's inserted into the database.
    * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
    */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:191','unique:organizations,name'],
            'acronym' => ['nullable','string','max:15'],
            'org_category'=>['nullable','string'],
            'founded'=>['nullable','numeric'],
            'location'=>['nullable'],
            'mobile' => ['nullable'],
            'telephone' => ['nullable'],
            'website' => ['nullable','url'],
            'email'=>['nullable','email'],
            'fax' => ['nullable'],
            'address' =>['nullable','string'],
        ];
    }


    public static function afterImport(AfterImport $event)
    {

    }

}
