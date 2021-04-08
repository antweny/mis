<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Repository\Interfaces\ProjectRepositoryInterface;
use Exception;

class ProjectController extends AuthController
{
    /**
     * @var
     */
    private $projectService;

    /**
     * ProjectController constructor.
     */
    public function __construct(ProjectRepositoryInterface $projectService)
    {
        parent::__construct();
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->projectService->model());

        try {
            $projects = $this->projectService->get();  //Get all projects
            return view('project.index',compact('projects'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $this->canCreate($this->projectService->model());
        try {
            $project = $this->projectService->model();  //Get all employees
            return view('project.create',compact('project'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $this->canCreate($this->projectService->model());

        try {
            $this->projectService->create($request->validated());
            return $this->success('Project created');
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
        $this->canUpdate($this->projectService->model());

        try {
            $project = $this->projectService->find($id);
            return view('project.edit',compact('project'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, $id)
    {
        $this->canUpdate($this->projectService->model());

        try {
            $this->projectService->update($id,$request->validated());
            return $this->successRoute('projects.index','Project updated');
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
        $this->canDelete($this->projectService->model());

        try {
            $this->projectService->delete($id);
            return $this->success('Project deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
