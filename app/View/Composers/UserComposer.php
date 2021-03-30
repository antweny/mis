<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class UserComposer extends BaseComposer
{
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

    public function compose(View $view)
    {
        $view->with('users',$this->model->selectNameID());
    }

}
