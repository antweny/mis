<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Requests\ItemOutRequest;
use App\Services\ItemIssueService;
use Exception;

class ItemIssueController extends AuthController
{
    protected $itemIssue;

    /**
     * ItemOut Controller constructor.
     */
    public function __construct(ItemIssueService $itemIssue)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemIssue = $itemIssue;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemIssues = $this->itemIssue->get();
            return view('item-issues.index',compact('itemIssues'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function issue($id)
    {
        try {
            $itemIssue = $this->itemIssue->find($id);
            return view('item-issues.edit',compact('itemIssue'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemOutRequest $request,$id)
    {
        try {
            $this->itemIssue->update($id,$request->validated());
            return $this->successRoute('itemIssues.index','Item Issued Successful');
        }
        catch (Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function reject($id)
    {
        try {
            $this->itemIssue->reject($id);
            return $this->successRoute('itemIssues.index','Request has been rejected');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
