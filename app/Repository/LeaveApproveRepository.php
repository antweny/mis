<?php

namespace App\Repository;

use App\Models\LeaveApplication;
use App\Repository\Interfaces\LeaveApproveRepositoryInterface;

class LeaveApproveRepository extends BaseRepository implements LeaveApproveRepositoryInterface
{
    /**
     * Leave Approve Repository constructor.
     */
    public function __construct(LeaveApplication $model)
    {
        parent::__construct($model);
    }

    /**
     * Get leave to Approve
     */
    public function leaveRequest($id)
    {
        return $this->model->leaveRequest($id)->with(['leave_type','employee'])->get();
    }

    /**
     * Update leave request
     */
    public function update($id, $request)
    {
        $leave = $this->find($id);
        return $this->updateLeaveApplicationStatus($leave,$request);
    }

    /*
     * View Submitted leave Application
     */
    public function viewLeaveDetails($id)
    {
        $leave = $this->find($id);
        return $this->checkLeaveApplicationStatus($leave);
    }

    /**
     * Check leave application status
     */
    private function checkLeaveApplicationStatus($leave)
    {
        switch ($leave->status) {
            case 'Sub':
                $request['status'] = 'Rev';
                return $this->updateLeaveApplicationStatus($leave,$request);
                break;
            default:
                return $leave;
        }
    }

    /*
     * Update leave application status based on the action
     */
    private function updateLeaveApplicationStatus($leave, $request)
    {
        $leave->status = $request['status'];
        $leave->remarks = isset($request['remarks']) ? $request['remarks'] : null;
        $leave->save();
        return $leave;
    }


}
