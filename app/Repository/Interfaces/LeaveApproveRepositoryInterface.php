<?php

namespace App\Repository\Interfaces;

interface LeaveApproveRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get leave request to approve
     */
    public function leaveRequest($id);

    public function viewLeaveDetails($id);

}
