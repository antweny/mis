<?php

namespace App\Http\Controllers;

use App\Services\ItemCategoryService;
use App\Http\Requests\ItemCategoryRequest;
use Exception;

class ItemCategoryController extends AuthController
{
    /**
     * @var
     */
    protected $itemCategory;

    /**
     * Item CategoryController constructor.
     */
    public function __construct(ItemCategoryService $itemCategory)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemCategory = $itemCategory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemCategories = $this->itemCategory->get();  //Get all itemCategories
            return view('item-categories.index',compact('itemCategories'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemCategoryRequest $request)
    {
        try {
            $this->itemCategory->create($request->validated());
            return $this->success('Item Category created');
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
            $itemCategory = $this->itemCategory->find($id);
            return view('item-categories.edit',compact('itemCategory'));
        }
        catch (Exception $e) {
            return $this->error();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemCategoryRequest $request, $id)
    {
        try {
            $this->itemCategory->update($id,$request->validated());
            return $this->successRoute('itemCategories.index','Item Category updated');
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
            $this->itemCategory->delete($id);
            return $this->success('Item Category moved to trash');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
