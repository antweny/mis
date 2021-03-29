<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayeeRequest;
use App\Services\PayeeService;
use Exception;

class PayeeController extends AuthController
{
    /**
     * @var
     */
    protected $payee;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(PayeeService $payee)
    {
        parent::__construct();
        $this->payee = $payee;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->payee->model());

        try {
            $payees = $this->payee->get();  //Get all titles
            return view('payees.index',compact('payees'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PayeeRequest $request)
    {
        $this->canCreate($this->payee->model());

        try {
            $this->payee->create($request->validated());
            return $this->success('Payee created');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->canUpdate($this->payee->model());

        try {
            $payee = $this->payee->find($id);
            return view('payees.edit',compact('payee'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PayeeRequest $request, $id)
    {
        $this->canUpdate($this->payee->model());

        try {
            $this->payee->update($id,$request->validated());
            return $this->successRoute('payees.index','Payee updated');
        }
        catch (\Exception $e) {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->canDelete($this->payee->model());

        try {
            $this->payee->delete($id);
            return $this->success('Payee deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
