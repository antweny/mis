<?php

namespace App\Repository\Interfaces;

interface EventRepositoryInterface extends BaseRepositoryInterface
{

    /*
     * Get event list with the participants
     */
    public function eventWithParticipants();
}
