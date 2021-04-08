<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Repository\Interfaces\PaymentRepositoryInterface;
use Exception;

class PaymentController extends AuthController
{
    /**
     * @var
     */
    protected $payment;

    /**
     * Organization Group Controller constructor.
     */
    public function __construct(PaymentRepositoryInterface $payment)
    {
        parent::__construct();
        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->payment->model());

        try {
            $payments = $this->payment->get();  //Get all titles
            return view('finance.payments.index',compact('payments'));
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
        $this->canCreate($this->payment->model());

        try {
            $payment = $this->payment->model();  //Get all employees
            return view('finance.payments.create',compact('payment'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $this->canCreate($this->payment->model());

        try {
            $this->payment->create($request->validated());
            return $this->success('Payment created');
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
        $this->canUpdate($this->payment->model());

        try {
            $payment = $this->payment->find($id);
            return view('finance.payments.edit',compact('payment'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        $this->canUpdate($this->payment->model());

        try {
            $this->payment->update($id,$request->validated());
            return $this->successRoute('payments.index','Payment updated');
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
        $this->canDelete($this->payment->model());

        try {
            $this->payment->delete($id);
            return $this->success('Payment deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }
}
