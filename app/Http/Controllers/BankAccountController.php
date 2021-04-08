<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Repository\Interfaces\BankAccountRepositoryInterface;
use Exception;

class BankAccountController extends AuthController
{
    /**
     * @var
     */
    protected $bankAccount;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(BankAccountRepositoryInterface $bankAccount)
    {
        parent::__construct();
        $this->bankAccount = $bankAccount;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->bankAccount->model());

        try {
            $bankAccounts = $this->bankAccount->get();  //Get all titles
            return view('finance.banks.accounts.index',compact('bankAccounts'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountRequest $request)
    {
        $this->canCreate($this->bankAccount->model());
        try {
            $this->bankAccount->create($request->validated());
            return $this->success('Bank Account created');
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
        $this->canUpdate($this->bankAccount->model());

        try {
            $bankAccount = $this->bankAccount->find($id);
            return view('finance.banks.accounts.edit',compact('bankAccount'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountRequest $request, $id)
    {
        $this->canUpdate($this->bankAccount->model());

        try {
            $this->bankAccount->update($id,$request->validated());
            return $this->successRoute('bankAccounts.index','Bank Account updated');
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
        $this->canDelete($this->bankAccount->model());

        try {
            $this->bankAccount->delete($id);
            return $this->success('Bank Account deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
