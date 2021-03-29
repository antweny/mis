<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemUnitRequest;
use App\Services\ItemUnitService;
use Exception;

class ItemUnitController extends AuthController
{
    /**
     * @var
     */
    protected $itemUnit;

    /**
     * Item Unit Controller constructor.
     */
    public function __construct(ItemUnitService $itemUnit)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemUnit = $itemUnit;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemUnits = $this->itemUnit->get();  //Get all titles
            return view('item-units.index',compact('itemUnits'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemUnitRequest $request)
    {
        try {
            $this->itemUnit->create($request->validated());
            return $this->success('Item Unit created');
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
            $itemUnit = $this->itemUnit->find($id);
            return view('item-units.edit',compact('itemUnit'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemUnitRequest $request, $id)
    {
        try {
            $this->itemUnit->update($id,$request->validated());
            return $this->successRoute('itemUnits.index','Item Unit updated');
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
            $this->itemUnit->delete($id);
            return $this->success('Item Unit deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }
}
