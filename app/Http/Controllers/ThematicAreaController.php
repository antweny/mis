<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThematicAreaRequest;
use App\Repository\Interfaces\ThematicAreaRepositoryInterface;
use Exception;

class ThematicAreaController extends AuthController
{
    /**
     * @var
     */
    private $thematicArea;

    /**
     * ThematicAreaController constructor.
     */
    public function __construct(ThematicAreaRepositoryInterface $thematicAreaService)
    {
        parent::__construct();
        $this->thematicArea = $thematicAreaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->thematicArea->model());

        try {
            $thematicAreas = $this->thematicArea->get();
            return view('op.thematic-areas.index',compact('thematicAreas'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThematicAreaRequest $request)
    {
        $this->canCreate($this->thematicArea->model());

        try {
            $this->thematicArea->create($request->validated());
            return $this->success('Thematic Area created');
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
        $this->canUpdate($this->thematicArea->model());

        try {
            $thematicArea = $this->thematicArea->find($id);
            return view('op.thematic-areas.edit', compact('thematicArea'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThematicAreaRequest $request,$id)
    {
        $this->canUpdate($this->thematicArea->model());

        try {
            $this->thematicArea->update($id,$request->validated());
            return $this->successRoute('thematicAreas.index','Thematic Area updated');
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
        $this->canDelete($this->thematicArea->model());

        try {
            $this->thematicArea->delete($id);
            return $this->success('Thematic Area deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

}
