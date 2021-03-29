<?php

namespace App\Exports;

use App\Models\Individual;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndividualExport implements FromCollection
{
    use Exportable;

    private $individual;

    public function __construct()
    {
        $this->individual = new Individual();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //dd('yessssssssss');
        return $this->individual->all();
    }
}
