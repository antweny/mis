<?php

namespace App\Repository\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /* Updating user details */
    public function updating($id,array $attributes);

    /* Send new Password to User */
    public function sendNewPassword($id);

}
