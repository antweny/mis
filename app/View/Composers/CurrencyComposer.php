<?php

namespace App\View\Composers;

use App\Models\Currency;
use Illuminate\View\View;

class CurrencyComposer extends BaseComposer
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function compose(View $view)
    {
        $view->with('currencies',$this->model->selectNameIDAcronym());
    }

}
