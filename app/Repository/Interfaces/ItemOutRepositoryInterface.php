<?php

namespace App\Repository\Interfaces;

interface ItemOutRepositoryInterface extends BaseRepositoryInterface
{

    public function issue($id,$request);



    public function reject($id);

}
