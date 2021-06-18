<?php

namespace App\Repository\Interfaces;

interface IndividualRepositoryInterface extends BaseRepositoryInterface
{
    //Export file
    public function export($format);


    //Import file
    public function import(array $attributes);




}
