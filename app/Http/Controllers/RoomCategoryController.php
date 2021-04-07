<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCategoryRequest;
use App\Repository\Interfaces\RoomCategoryRepositoryInterface;
use Exception;

class RoomCategoryController extends AuthController
{

    /**
     * @var
     */
    protected $roomCategory;

    /**
     * Room CategoryController constructor.
     */
    public function __construct(RoomCategoryRepositoryInterface $roomCategoryService)
    {
        parent::__construct();
        $this->roomCategory = $roomCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $roomCategories = $this->roomCategory->get();  //Get all roomCategories
            return view('room.categories.index',compact('roomCategories'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomCategoryRequest $request)
    {
        try {
            $this->roomCategory->create($request->validated());
            return $this->success('Room Category created');
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
            $roomCategory = $this->roomCategory->find($id);
            return view('room.categories.edit',compact('roomCategory'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomCategoryRequest $request, $id)
    {
        try {
            $this->roomCategory->update($id,$request->validated());
            return $this->successRoute('roomCategories.index','Room Category updated');
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
            $this->roomCategory->delete($id);
            return $this->success('Room Category moved to trash');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
