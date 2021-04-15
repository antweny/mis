<?php

namespace App\Repository\Interfaces;


interface AttendanceRepositoryInterface extends BaseRepositoryInterface
{

    public function checkIn();


    public function checkOut();
}
