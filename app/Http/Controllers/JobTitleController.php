<?php

namespace App\Http\Controllers;
use App\Http\Requests\JobTitleRequest;
use App\Repository\Interfaces\JobTitleRepositoryInterface;
use Exception;

class JobTitleController extends AuthController
{

    /**
     * @var
     */
    protected $interface;

    /**
     * TitleController constructor.
     */
    public function __construct(JobTitleRepositoryInterface $interface)
    {
        parent::__construct();
        $this->interface = $interface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->interface->model());

        try {
            $jobTitles = $this->interface->get();  //Get all jobTitles
            return view('job.titles.index',compact('jobTitles'));
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
        $this->canCreate($this->interface->model());

        try {
            $this->interface->create($request->validated());
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
        $this->canUpdate($this->interface->model());

        try {
            $jobTitle = $this->interface->find($id);
            return view('job.titles.edit',compact('jobTitle'));
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
        $this->canUpdate($this->interface->model());

        try {
            $this->interface->update($id,$request->validated());
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
        $this->canDelete($this->interface->model());

        try {
            $this->interface->delete($id);
            return $this->success('Job Title deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
