<?php

namespace App\Exports;

use App\Models\Individual;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndividualsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Individual::all();
    }
}
