<?php

namespace App\View\Composers;

use App\Repositories\AssetTypeRepository;
use Illuminate\View\View;

class AssetTypeComposer extends BaseComposer
{
    public function __construct(AssetTypeRepository $repo)
    {
        parent::__construct($repo);
    }

    public function compose(View $view)
    {
        $view->with('assetTypes', $this->repo->selectNameAndId());
    }

}
