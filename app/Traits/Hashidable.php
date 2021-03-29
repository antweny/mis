<?php

namespace App\Traits;
use Vinkla\Hashids\Facades\Hashids;

trait Hashidable
{
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey(),20,15,1,3);
    }
}
