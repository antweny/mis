<?php

namespace App\Repository\Interfaces;


interface AttendanceRepositoryInterface extends BaseRepositoryInterface
{

    public function checkIn($id);


    public function checkOut($id);
}
