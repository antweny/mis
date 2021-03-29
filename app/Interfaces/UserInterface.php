<?php

namespace App\Interfaces;

interface UserInterface extends BaseInterface
{
    /**
     * Assign Roles to New User
     */
    public function assignRoles($user, $roles);

    /**
     * Update Roles to existing user
     */
    public function updateRoles($user, $roles);

    /**
     * Remove all roles from an existing user user
     */
    public function removeRoles($user);

}
