<?php

namespace App\Exports\Individual;

use App\Individual;
use Maatwebsite\Excel\Concerns\FromCollection;

class FilterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Individual::all();
    }
}
