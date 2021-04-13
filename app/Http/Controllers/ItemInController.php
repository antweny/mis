<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemInRequest;
use App\Repository\Interfaces\ItemInRepositoryInterface;
use App\Services\ItemInService;
use Exception;

class ItemInController extends AuthController
{
    protected $itemIn;

    /**
     * ItemIn Controller constructor.
     */
    public function __construct(ItemInRepositoryInterface $itemIn)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemIn = $itemIn;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemIns = $this->itemIn->get();
            return view('item.in.index',compact('itemIns'));
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
            $itemIn = $this->itemIn->model();
            return view('item.in.create',compact('itemIn'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemInRequest $request)
    {
        try {
            $this->itemIn->create($request->validated());
            return $this->successRoute('itemIn.index','Item Received');
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
        $state = 'update';
        try {
            $itemIn = $this->itemIn->find($id);
            return view('item.in.edit',compact('itemIn','state'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemInRequest $request,$id)
    {
        try {
            $this->itemIn->updating($id,$request->validated());
            return $this->successRoute('itemIn.index','Item Received Updated');
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->itemIn->delete($id);
            return $this->successRoute('itemIn.index','Item Received deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }



}
