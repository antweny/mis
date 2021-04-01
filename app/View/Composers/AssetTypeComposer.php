<?php

namespace App\View\Composers;

use App\Models\AssetType;
use Illuminate\View\View;

class AssetTypeComposer extends BaseComposer
{
    public function __construct(AssetType $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('assetTypes', $this->model->selectNameID());
    }

}
