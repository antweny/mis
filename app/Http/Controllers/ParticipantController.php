<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\ParticipantRequest;
use App\Repository\Interfaces\ParticipantRepositoryInterface;
use Exception;

class ParticipantController extends AuthController
{
    /**
     * @var
     */
    protected $participant;

    /**
     * ParticipantController constructor.
     */
    public function __construct(ParticipantRepositoryInterface $participantService)
    {
        parent::__construct();
        $this->participant = $participantService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($event = null)
    {
        try {
            $participants = $this->participant->get();
            return view('event.participant.index',compact('participants'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function engagement($individual)
    {
        try {
            $events = $this->participant->individualEngagement($individual);
            return view('event.event.index',compact('events'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $participant = $this->participant->model();  //Get all participantCategories
            return view('event.participant.create',compact('participant'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParticipantRequest $request)
    {
        try {
            $this->participant->create($request->except('_token','_method'));
            return $this->success('Event Participant created');
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
            $participant = $this->participant->find($id);
            return view('event.participant.edit', compact('participant'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParticipantRequest $request,$id)
    {
        try {
            $this->participant->update($id,$request->except('_token','_method'));
            return $this->successRoute('participants.index','Participant updated');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->participant->delete($id);
            return $this->success('Event Participant deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

//    /**
//     * Import Batch of file.
//     */
//    public function import(ImportFileRequest $request)
//    {
//        try {
//            $this->participant->import($request);
//            return $this->success('Event Participants imported successfully!');
//        }
//        catch (Exception $e) {
//            return $this->error($e->getMessage());
//        }
//    }


}
