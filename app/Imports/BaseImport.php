<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class  BaseImport  implements ToModel, WithChunkReading, WithBatchInserts,  WithHeadingRow
{

    public function model(array $row)
    {

    }

    /*  Chuck the data  */
    public function chunkSize(): int
    {
        return 1000;
    }

    /*  Insert to batches */
    public function batchSize(): int
    {
        return 1000;
    }

}

//class  BaseImport implements
//    SkipsOnError,
//    WithValidation,
//    SkipsOnFailure,
//    WithChunkReading,
//    ShouldQueue,
//    WithEvents
//{
//    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;
//
//    /**
//     * @param
//     */
//    public function model(array $row)
//    {
//        //
//    }
//
//   /*
//    * Sometimes you might want to validate each row before it's inserted into the database.
//    * By implementing the WithValidation concern, you can indicate the rules that each row need to adhere to.
//    */
//    public function rules(): array
//    {
//
//    }
//
//    /*
//     * Importing a large file can have a huge impact on the memory usage, as the library will try to load the entire sheet into memory.
//     */
//    public function chunkSize(): int
//    {
//        return 50;
//    }
//
//    public static function afterImport(AfterImport $event)
//    {
//
//    }
//
//    public function onFailure(Failure ...$failure)
//    {
//
//    }
//
//
//
//
//
//}
