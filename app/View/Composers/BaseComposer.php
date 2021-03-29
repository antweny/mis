<?php

namespace App\View\Composers;

use Illuminate\Database\Eloquent\Model;

class BaseComposer
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}
