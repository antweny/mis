<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTitleRequest;
use App\Services\JobTitleService;
use Exception;

class JobTitleController extends AuthController
{

    /**
     * @var
     */
    protected $jobTitleService;

    /**
     * TitleController constructor.
     */
    public function __construct(JobTitleService $jobTitleService)
    {
        parent::__construct();
        $this->jobTitleService = $jobTitleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->jobTitleService->model());

        try {
            $jobTitles = $this->jobTitleService->get();  //Get all jobTitles
            return view('job-titles.index',compact('jobTitles'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobTitleRequest $request)
    {
        $this->canCreate($this->jobTitleService->model());

        try {
            $this->jobTitleService->create($request->validated());
            return $this->success('Job Title created');
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
        $this->canUpdate($this->jobTitleService->model());

        try {
            $jobTitle = $this->jobTitleService->find($id);
            return view('job-titles.edit',compact('jobTitle'));
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobTitleRequest $request, $id)
    {
        $this->canUpdate($this->jobTitleService->model());

        try {
            $this->jobTitleService->update($id,$request->validated());
            return $this->successRoute('jobTitles.index','Job Title updated');
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
        $this->canDelete($this->jobTitleService->model());

        try {
            $this->jobTitleService->delete($id);
            return $this->success('Job Title deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
