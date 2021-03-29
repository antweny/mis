<?php

namespace App\Policies;

use App\Models\LeaveApplication;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LeaveApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the resources.
     */
    public function view(User $user)
    {
        return $user->can('leave-application_view');
    }

    /**
     * Determine whether the user can create new resource.
     */
    public function create(User $user)
    {
        return $user->can('leave-application_create');
    }

    /**
     * Determine whether the user can update the question.
     */
    public function update(User $user, LeaveApplication $leave)
    {
        if ($user->employee->id == $leave->employee_id && $leave->status == 'Sub') {
           return $this->allow();
        }
        else {
            return $this->deny('Your team does not have access to this server');
        }
    }

    /**
     * Determine whether the user can delete the question.
     */
    public function delete(User $user, LeaveApplication $leave)
    {
        if ($user->employee->id == $leave->employee_id && $leave->status == 'Sub') {
            return $this->allow();
        }
        else {
            return $this->deny();
        }
    }

    /**
     * Determine whether the user can view the resources.
     */
    public function approveLeave(User $user)
    {
        return $user->can('approve-leave');
    }

    /**
     *
     */
    public function viewLeave(User $user,LeaveApplication $leave)
    {
        if( $user->employee->id == $leave->send_to && $user->can('approve-leave')) {
            return $this->allow();
        }
        $this->deny();

    }

    /**
     * Determine whether the user can create new resource.
     */
    public function approve(User $user, LeaveApplication $leave)
    {
        if( $user->employee->id == $leave->send_to && in_array($leave->status,['Rev','Rej']) && $user->can('approve-leave')) {
            return $this->allow();
        }
        return $this->deny();
    }

    /**
     * Determine whether the user can create new resource.
     */
    public function reject(User $user, LeaveApplication $leave)
    {
        if(in_array($leave->status,['Rev','Acc']) && $user->id == $leave->send_to && $user->can('approve-leave')) {
            return $this->allow();
        }
        return $this->deny();
    }




}
