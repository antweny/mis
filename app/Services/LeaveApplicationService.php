<?php

namespace App\Services;

use App\Events\Leave\NewLeaveApplicationEvent;
use App\Repositories\LeaveApplicationRepository;
use Exception;

class LeaveApplicationService extends BaseService
{

    public function __construct(LeaveApplicationRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get auth employee application leaves
     */
    public function getLeave($id)
    {
        return $this->repo->userLeaves($id);
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        try {
            $request['receiver'] = $this->repo->receiverDetails($request['send_to']) ;  //Get Send to Name and Email
            $request['leave_type'] = $this->repo->leaveType($request['leave_type_id']) ; // Get leave type name
            $request['days'] = $this->repo->days($request['start_date'], $request['end_date']); //Find total leave days
            $request['employee'] = auth()->user()->employee->name; //Get Authenticated User Name
            $request['leave'] = $this->repo->create($request); //Save new leave and get the
            //Send email Notification to leave approval
            event(new NewLeaveApplicationEvent($request));
            return true;
        }
        catch (Exception $e) {
            error_log($e);
            throw $e;
        }
    }

    /**
     * Create new resource
     */
    public function update($id, $request)
    {
        $request['days'] = $this->repo->days($request['start_date'], $request['end_date']);
        return $this->repo->update($id,$request);
    }
}
