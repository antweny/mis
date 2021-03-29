<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('visitor_create');
    }

    /**
     * Determine whether the user can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('visitor_view');
    }

    /**
     * Determine whether the user can update the question.
     */
    public function update(User $user)
    {
        return $user->can('visitor_update');
    }

    /**
     * Determine whether the user can delete the question.
     */
    public function delete(User $user)
    {
        return $user->can('visitor_delete');
    }
}
