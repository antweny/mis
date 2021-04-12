<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Http\Requests\ItemRequest;
use App\Imports\ItemImport;
use App\Repository\Interfaces\ItemRepositoryInterface;
use App\Services\ItemService;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class ItemController extends AuthController
{
    /**
     * @var
     */
    protected $item;

    /**
     * ItemController constructor.
     */
    public function __construct(ItemRepositoryInterface $item)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $items = $this->item->get();  //Get all items
            return view('item.index',compact('items'));
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
        try {
            $item = $this->item->model();
            return view('item.create',compact('item'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        try {
            $this->item->create($request->validated());
            return $this->success('Item created');
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
            $item = $this->item->find($id);
            return view('item.edit',compact('item'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request,$id)
    {
        try {
            $this->item->update($id,$request->validated());
            return $this->successRoute('items.index','Item Category updated');
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
            $this->item->delete($id);
            return $this->success('Item deleted!');
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
        try {
            Excel::import(new ItemImport($this->item),$request->file('imported_file'));
        }
        catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
        return $this->success('Item imported successfully!');
    }
}
