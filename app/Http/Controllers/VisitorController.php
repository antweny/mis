<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Repository\Interfaces\VisitorRepositoryInterface;
use App\Services\VisitorService;
use Exception;

class VisitorController extends AuthController
{
    /**
     * @var
     */
    private $visitorService;

    /**
     * VisitorController constructor.
     */
    public function __construct(VisitorRepositoryInterface $visitorService)
    {
        parent::__construct();
        $this->visitorService = $visitorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->visitorService->model());

        try {
            $visitors = $this->visitorService->withRelation();  //Get all visitors
            return view('visitors.index',compact('visitors'));
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
        $this->canCreate($this->visitorService->model());

        try {
            $visitor = $this->visitorService->model();  //Get all employees
            return view('visitors.create',compact('visitor'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitorRequest $request)
    {
        $this->canCreate($this->visitorService->model());

        try {
            $this->visitorService->create($request->validated());
            return $this->success('Visitor created');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->visitorService->model());

        try {
            $visitor = $this->visitorService->find($id);
            return view('visitors.edit',compact('visitor'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisitorRequest $request, $id)
    {
        $this->canUpdate($this->visitorService->model());

        try {
            $this->visitorService->update($id,$request->validated());
            return $this->successRoute('visitors.index','Visitor updated');
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
        $this->canDelete($this->visitorService->model());

        try {
            $this->visitorService->delete($id);
            return $this->success('Visitor deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
