<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StakeholderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('stakeholder_view') || $user->can('donor_view') || $user->can('bank_view') ;
    }

    /**
     * Determine whether the user can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('stakeholder_create') || $user->can('donor_create') || $user->can('bank_create');
    }

    /**
     * Determine whether the user can update the question.
     */
    public function update(User $user)
    {
        return $user->can('stakeholder_update') || $user->can('donor_update') || $user->can('bank_update');
    }

    /**
     * Determine whether the user can delete the question.
     */
    public function delete(User $user)
    {
        return $user->can('stakeholder_delete') || $user->can('donor_delete') || $user->can('bank_delete');
    }
}
