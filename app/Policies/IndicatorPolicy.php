<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndicatorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('indicator_create');
    }

    /**
     * Determine whether the user can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('indicator_view');
    }

    /**
     * Determine whether the user can update the question.
     */
    public function update(User $user)
    {
        return $user->can('indicator_update');
    }

    /**
     * Determine whether the user can delete the question.
     */
    public function delete(User $user)
    {
        return $user->can('indicator_delete');
    }
}
