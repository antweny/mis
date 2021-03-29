<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\Individual;
use App\Models\IndividualGroup;
use App\Models\Location;
use App\Models\Organization;
use App\Models\Participant;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ParticipantImport implements
    ToModel ,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithChunkReading
{

    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;

    protected $event;
    protected $individual;
    protected $individualGroup;
    protected $organization;
    protected $location;

    public function __construct()
    {
        $this->event = new Event;
        $this->individual = new Individual;
        $this->individualGroup = new IndividualGroup;
        $this->organization = new Organization;
        $this->location = new Location;

    }

    /**
     * @param array $row
     */
    public function model(array $row)
    {
        return new Participant([
            'event_id'=> $this->event->findOrCreate($row['event']),
            'individual_id'=> $this->individual->returnIndividualID($row['name'],$row['mobile']),
            'date'=> Date::excelToDateTimeObject($row['date'])->format('Y-m-d'),
            //'participant_level'=> $row['level'],
            'individual_group_id'=> $this->individualGroup->findOrCreate($row['group']),
            'organization_id'=> $this->organization->findOrCreate($row['organization']),
            'location_id'=> $this->location->findOrCreate($row['location']),
        ]);
    }

   /*
    * Sometimes you might want to validate each row before it's inserted into the database.
    * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
    */
    public function rules(): array
    {
        return [
            'event' => ['required','string'],
            'name' => ['required','string'],
            'date' => ['required'],
            'group' => ['nullable','string'],
            'organization' => ['nullable','string'],
            'location' => ['nullable','string'],
            'mobile' => ['nullable','numeric'],
        ];
    }

    /*
    * Importing a large file can have a huge impact on the memory usage, as the library will try to load the entire sheet into memory.
    */
    public function chunkSize(): int
    {
        return 50;
    }

    public static function afterImport(AfterImport $event)
    {

    }

    public function onFailure(Failure ...$failure)
    {

    }


}
