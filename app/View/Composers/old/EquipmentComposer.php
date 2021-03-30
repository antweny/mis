<?php

namespace App\View\Composers;

use App\Repositories\EquipmentRepository;
use Illuminate\View\View;

class EquipmentComposer extends BaseComposer
{
    public function __construct(EquipmentRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('equipments', $this->repo->getEquipments());
    }

}
