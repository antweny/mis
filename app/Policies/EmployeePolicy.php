<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('employee_view');
    }

    /**
     * Determine whether the user can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('employee_create');
    }

    /**
     * Determine whether the user can update the question.
     */
    public function update(User $user)
    {
        return $user->can('employee_update');
    }

    /**
     * Determine whether the user can delete the question.
     */
    public function delete(User $user)
    {
        return $user->can('employee_delete');
    }
}
