<?php

namespace App\Repository\Interfaces;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /*
     * Updating user details
     */
    public function updating($id,array $attributes);

    /*
     * Sending User login credentials
     */
    public function sendLogin($id);

    /*
     * User Password Reset
     */
    public function resetPassword($id, array $attributes);

}
