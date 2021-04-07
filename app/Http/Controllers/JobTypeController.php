<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTypeRequest;
use App\Repository\Interfaces\JobTypeRepositoryInterface;
use Exception;

class JobTypeController extends AuthController
{

    /**
     * @var
     */
    protected $jobType;

    /**
     * JobTypeController constructor.
     */
    public function __construct(JobTypeRepositoryInterface $interface)
    {
        parent::__construct();
        $this->jobType= $interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->jobType->model());

        try {
            $jobTypes = $this->jobType->paginate();  //Get all jobTypes
            return view('job.types.index',compact('jobTypes'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobTypeRequest $request)
    {
        $this->canCreate($this->jobType->model());

        try {
            $this->jobType->create($request->validated());
            return $this->success('Job Type created');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->jobType->model());

        try {
            $jobType = $this->jobType->find($id);
            return view('job.types.edit',compact('jobType'));
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobTypeRequest $request, $id)
    {
        $this->canUpdate($this->jobType->model());

        try {
            $this->jobType->update($id,$request->validated());
            return $this->successRoute('jobTypes.index','Job Type updated');
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
        $this->canDelete($this->jobType->model());

        try {
            $this->jobType->delete($id);
            return $this->success('Job Type deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
