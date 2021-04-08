<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoucherRequest;
use App\Repository\Interfaces\VoucherRepositoryInterface;
use Exception;

class VoucherController extends AuthController
{
    /**
     * @var
     */
    protected $voucher;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(VoucherRepositoryInterface $voucher)
    {
        parent::__construct();
        $this->voucher = $voucher;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->voucher->model());

        try {
            $vouchers = $this->voucher->get();  //Get all titles
            return view('finance.vouchers.index',compact('vouchers'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $this->canCreate($this->voucher->model());

        try {
            $voucher = $this->voucher->model();  //Get all employees
            return view('finance.vouchers.create',compact('voucher'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherRequest $request)
    {
        $this->canCreate($this->voucher->model());
        try {
            $this->voucher->create($request->validated());
            return $this->success('Voucher created');
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
        $this->canUpdate($this->voucher->model());

        try {
            $voucher = $this->voucher->find($id);
            return view('finance.vouchers.edit',compact('voucher'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $this->canView($this->voucher->model());

        try {
            $voucher = $this->voucher->find($id);
            return view('finance.vouchers.show',compact('voucher'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherRequest $request, $id)
    {
        $this->canUpdate($this->voucher->model());

        try {
            $this->voucher->update($id,$request->validated());
            return $this->successRoute('vouchers.index','Voucher updated');
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
        $this->canDelete($this->voucher->model());

        try {
            $this->voucher->delete($id);
            return $this->success('Voucher deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
