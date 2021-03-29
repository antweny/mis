<?php

namespace App\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;

class BaseImport implements
    ToModel ,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithChunkReading,
    ShouldQueue,
    WithEvents
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;

    /**
     * @param
     */
    public function model(array $row)
    {
        //
    }

   /*
    * Sometimes you might want to validate each row before it's inserted into the database.
    * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
    */
    public function rules(): array
    {

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
