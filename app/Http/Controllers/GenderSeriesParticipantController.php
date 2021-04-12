<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenderSeriesParticipantRequest;
use App\Repository\Interfaces\GenderSeriesParticipantRepositoryInterface;
use App\Services\GenderSeriesParticipantService;
use Illuminate\Http\Request;
use Exception;

class GenderSeriesParticipantController extends AuthController
{
    private $genderParticipant;

    public function __construct(GenderSeriesParticipantRepositoryInterface $genderParticipant)
    {
        parent::__construct();
        $this->genderParticipant = $genderParticipant;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->genderParticipant->model());

        try {
            $genderParticipants = $this->genderParticipant->get();  //Get all holidays
            return view('event.gender.participants.index',compact('genderParticipants'));
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
        $this->canCreate($this->genderParticipant->model());
        try {
            $genderSeriesParticipant = $this->genderParticipant->model();  //Get all holidays
            return view('event.gender.participants.create',compact('genderSeriesParticipant'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenderSeriesParticipantRequest $request)
    {
        $this->canCreate($this->genderParticipant->model());

        try {
            $this->genderParticipant->create($request->validated());  //Get all holidays
            return $this->success('Gender Series Participant created');
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
        $this->canUpdate($this->genderParticipant->model());
        try {
            $genderSeriesParticipant = $this->genderParticipant->find($id);  //Get all holidays
            return view('event.gender.participants.edit',compact('genderSeriesParticipant'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenderSeriesParticipantRequest $request, $id)
    {
        $this->canUpdate($this->genderParticipant->model());
        try {
            $this->genderParticipant->update($id,$request->validated());  //Get all holidays
            return $this->successRoute('genderSeriesParticipants.index');
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
        $this->canDelete($this->genderParticipant->model());

        try {
            $this->genderParticipant->delete($id);
            return $this->success('Gender Series Participant deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
