<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestItemRequest;
use App\Repository\Interfaces\ItemRequestRepositoryInterface;
use Exception;

class ItemRequestController extends AuthController
{
    protected $itemRequest;

    /**
     * ItemOut Controller constructor.
     */
    public function __construct(ItemRequestRepositoryInterface $itemRequest)
    {
        parent::__construct();
        $this->middleware('employee');
        $this->itemRequest = $itemRequest;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemRequests = $this->itemRequest->get($this->userEmployeeId());
            return view('item.requests.index',compact('itemRequests'));
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
            $itemRequest = $this->itemRequest->model();
            return view('item.requests.create',compact('itemRequest'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestItemRequest $request)
    {
        try {
            $this->itemRequest->create($request->validated());
            return $this->successRoute('itemRequests.index','Item Request Sent');
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
            $itemRequest = $this->itemRequest->find($id);
            return view('item.requests.edit',compact('itemRequest'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestItemRequest $request,$id)
    {
        try {
            $this->itemRequest->update($id,$request->validated());
            return $this->successRoute('itemRequests.index','Item Request Updated');
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
            $this->itemRequest->delete($id);
            return $this->successRoute('itemRequests.index','Item Request Deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
