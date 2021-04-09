<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCategoryRequest;
use App\Repository\Interfaces\EventCategoryRepositoryInterface;
use App\Services\EventCategoryService;
use Exception;

class EventCategoryController extends AuthController
{

    /**
     * @var
     */
    protected $eventCategory;

    /**
     * Event CategoryController constructor.
     */
    public function __construct(EventCategoryRepositoryInterface $eventCategoryService)
    {
        parent::__construct();
        $this->eventCategory = $eventCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $eventCategories = $this->eventCategory->get();  //Get all eventCategories
            return view('event.categories.index',compact('eventCategories'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCategoryRequest $request)
    {
        try {
            $this->eventCategory->create($request->validated());
            return $this->success('Event Category created');
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
            $eventCategory = $this->eventCategory->find($id);
            return view('event.categories.edit',compact('eventCategory'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventCategoryRequest $request, $id)
    {
        try {
            $this->eventCategory->update($id,$request->validated());
            return $this->successRoute('eventCategories.index','Event Category updated');
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
            $this->eventCategory->delete($id);
            return $this->success('Event Category moved to trash');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
