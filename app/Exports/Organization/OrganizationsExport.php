<?php

namespace App\Exports\Organization;

use App\Models\Organization;
use App\Repository\Interfaces\OrganizationRepositoryInterface;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrganizationsExport implements FromView
{

    /* @return \Illuminate\Support\Collection  */
    public function view(): View
    {
        return view('organization.components.export',[
            'organizations' => Organization::all()
        ]);
    }
}
