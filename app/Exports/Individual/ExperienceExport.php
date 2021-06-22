<?php

namespace App\Exports\Individual;

use App\Models\Experience;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExperienceExport implements FromView
{
    /* @return \Illuminate\Support\Collection  */
    public function view(): View
    {
        return view('individual.experiences.components.export',[
            'experiences' => Experience::all()
        ]);
    }
}
