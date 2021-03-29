<?php

namespace App\Services;

use App\Events\Leave\LeaveApproveEvent;
use App\Repositories\ApproveLeaveRepository;

class ApproveLeaveService extends BaseService
{
    public function __construct(ApproveLeaveRepository $repo)
    {
        parent::__construct($repo);
    }

    public function leaveToApprove($id)
    {
        return $this->repo->leaveToApprove($id);
    }

    /**
     * View Specified resource
     */
    public function show($id)
    {
        return $this->repo->show($id);
    }

    /**
     * Accept or Reject the leave
     */
    public function update($id,$request)
    {
        //Initialize empty array
        $data = array();

        $request['status'] = $request['state']; //Assign State to Status

        //Get the leave values
        $object = $this->repo->update($id,$request);
        //Get Employee Requester Name
        $data['name'] = $this->repo->employeeName($object->employee_id);
        $data['email'] = $this->repo->employeeEmail($object->employee_id);
        $data['remarks'] = $request['remarks'];
        $data['date'] = $object->created_at;
        //Get Approver Name
        $data['employee'] = auth()->user()->employee->name;
        //
        if($request['state'] == 'Acc') {
            $data['status'] = 'Accepted';
        }
        else {
            $data['status'] = 'Rejected';
        }
        event(new LeaveApproveEvent($data));

        return;
    }



}
