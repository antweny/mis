<?php

namespace App\Http\Controllers;

use App\Http\Requests\StakeholderRequest;
use App\Repository\Interfaces\BankRepositoryInterface;
use App\Services\BankService;
use Exception;

class BankController extends AuthController
{
    /**
     * @var
     */
    protected $bank;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(BankRepositoryInterface $bank)
    {
        parent::__construct();
        $this->bank = $bank;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->bank->model());

        try {
            $banks = $this->bank->get();  //Get all titles
            return view('finance.banks.index',compact('banks'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StakeholderRequest $request)
    {
        $this->canCreate($this->bank->model());
        try {
            $this->bank->create($request->validated());
            return $this->success('Bank created');
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
        $this->canUpdate($this->bank->model());

        try {
            $bank = $this->bank->find($id);
            return view('finance.banks.edit',compact('bank'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StakeholderRequest $request, $id)
    {
        $this->canUpdate($this->bank->model());

        try {
            $this->bank->update($id,$request->validated());
            return $this->successRoute('banks.index','Bank updated');
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
        $this->canDelete($this->bank->model());

        try {
            $this->bank->delete($id);
            return $this->success('Bank deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
