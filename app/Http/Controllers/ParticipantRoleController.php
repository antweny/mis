<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRoleRequest;
use App\Repository\Interfaces\ParticipantRoleRepositoryInterface;
use App\Services\ParticipantRoleService;
use Exception;

class ParticipantRoleController extends AuthController
{
    /**
     * @var
     */
    protected $participantRole;

    /**
     * Participant Role Controller constructor.
     */
    public function __construct(ParticipantRoleRepositoryInterface $participantRoleService)
    {
        parent::__construct();
        $this->participantRole = $participantRoleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $participantRoles = $this->participantRole->get();  //Get all titles
            return view('event.participant.roles.index',compact('participantRoles'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParticipantRoleRequest $request)
    {
        try {
            $this->participantRole->create($request->validated());
            return $this->success('Participant Role created');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $participantRole = $this->participantRole->find($id);
            return view('event.participant.roles.edit',compact('participantRole'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParticipantRoleRequest $request, $id)
    {
        try {
            $this->participantRole->update($id,$request->validated());
            return $this->successRoute('participantRoles.index','Participant Role updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request,'Duplicate name');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->participantRole->delete($id);
            return $this->success('Participant Role deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
