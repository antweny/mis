<?php

namespace App\Imports;

use App\Models\Individual;
use App\Models\Location;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndividualImport implements ToModel, WithBatchInserts, WithChunkReading, WithHeadingRow, ShouldQueue
{
    private $location;

    private $individual;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * @param array $row
     */
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

    private function uniqueIndividual($name,$mobile)
    {
        return Individual::uniqueIndividual($name,$mobile);
    }

   /*
    * Sometimes you might want to validate each row before it's inserted into the database.
    * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
    */
//    public function rules(): array
//    {
//        return [
//            'name' => ['required','string','max:100'],
//            'sex' => ['nullable','string'],
//            'age_group' => ['nullable','string'],
//            'location'=>['nullable','string'],
//            'mobile' => ['nullable','numeric'],
//        ];
//    }

    /*  */
    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }



}
