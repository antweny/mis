<?php

namespace App\Exports\Individual;

use App\Models\Individual;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IndividualsExport implements FromView, ShouldQueue
{
    /* @return \Illuminate\Support\Collection  */
    public function view(): View
    {
        return view('individual.components.export',[
            'individuals' => Individual::all()
        ]);
    }
}
