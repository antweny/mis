<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\AuthController;
use App\Http\Requests\Item\ItemOutRequest;
use App\Repositories\Item\ItemOutRepository;
use Exception;

class ItemOutController extends AuthController
{
    protected $itemOut;

    /**
     * ItemOut Controller constructor.
     */
    public function __construct(ItemOutRepository $itemOut)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemOut = $itemOut;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemOuts = $this->itemOut->relationWith();
            return view('item.out.index',compact('itemOuts'));
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->error();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $itemOut = $this->itemOut->find($id);
        if (!is_null($itemOut)){
            return view('item.out.edit',compact('itemOut'));
        }
        else {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemOutRequest $request,$id)
    {
        $itemOut = $this->itemOutService->update($id,$request->validated());
        if($itemOut) {
            return $this->successRoute('itemOut.index','Item Issued Successful');
        }
        else {
            return $this->errorWithInput($request);
        }
    }
}
