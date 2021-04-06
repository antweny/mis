<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\IndividualExperienceRequest;
use App\Repository\Interfaces\IndividualExperienceRepositoryInterface;
use Exception;

class IndividualExperienceController extends AuthController
{
    /**
     * @var
     */
    protected $experience;

    /**
     * Experience Controller constructor.
     */
    public function __construct(IndividualExperienceRepositoryInterface $experienceService)
    {
        parent::__construct();
        $this->experience = $experienceService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->experience->model());

        try {
            $experiences = $this->experience->get();  //Get all experiences
            return view('individual.experiences.index',compact('experiences'));
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
        $this->canCreate($this->experience->model());

        try {
            $experience = $this->experience->model();
            return view('individual.experiences.create',compact('experience'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndividualExperienceRequest $request)
    {
        $this->canCreate($this->experience->model());

        try {
            $this->experience->create($request->except('_token'));
            return $this->success('Individual experience created');
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
        $this->canUpdate($this->experience->model());

        try {
            $experience = $this->experience->find($id);
            return view('individual.experiences.edit',compact('experience'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndividualExperienceRequest $request, $id)
    {
        $this->canUpdate($this->experience->model());

        try {
            $this->experience->update($id,$request->validated());
            return $this->successRoute('experiences.index','Experience updated');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->experience->model());

        try {
            $this->experience->delete($id);
            return $this->success('Experience deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }

    /**
     * Import Batch of file.
     */
    public function import(ImportFileRequest $request)
    {
        $this->canCreate($this->experience->model());
        try {
            $this->experience->import($request);
            return $this->success('Experience imported successfully!');
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Get all the members from the specific organization
     */
    public function organization($organization)
    {
        $this->canView($this->experience->model());
        try {
            $experiences = $this->experience->organization($organization);
            return view('individual.experiences.index',compact('experiences'));
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
