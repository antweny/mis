<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Repository\Interfaces\CurrencyRepositoryInterface;
use Exception;

class CurrencyController extends AuthController
{
    /**
     * @var
     */
    protected $currency;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(CurrencyRepositoryInterface $currency)
    {
        parent::__construct();
        $this->currency = $currency;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->currency->model());

        try {
            $currencies = $this->currency->get();  //Get all titles
            return view('currencies.index',compact('currencies'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        $this->canCreate($this->currency->model());
        try {
            $this->currency->create($request->validated());
            return $this->success('Currency created');
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
        $this->canUpdate($this->currency->model());

        try {
            $currency = $this->currency->find($id);
            return view('currencies.edit',compact('currency'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, $id)
    {
        $this->canUpdate($this->currency->model());

        try {
            $this->currency->updating($id,$request->validated());
            return $this->successRoute('currencies.index','Currency updated');
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
        $this->canDelete($this->currency->model());

        try {
            $this->currency->delete($id);
            return $this->success('Currency deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
