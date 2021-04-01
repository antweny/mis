<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Repository\Interfaces\EquipmentRepositoryInterface;
use App\Services\EquipmentService;
use Exception;

class EquipmentController extends AuthController
{

    /**
     * @var
     */
    protected $equipment;

    /**
     * EquipmentController constructor.
     */
    public function __construct(EquipmentRepositoryInterface $equipment)
    {
        parent::__construct();
        $this->equipment = $equipment;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $equipments = $this->equipment->get();  //Get all equipments
            return view('equipments.index',compact('equipments'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentRequest $request)
    {
        try {
            $this->equipment->create($request->validated());
            return $this->success('Equipment created');
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
        $equipment = $this->equipment->find($id);
        if (!is_null($equipment)){
            return view('equipments.edit',compact('equipment'));
        }
        else {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentRequest $request, $id)
    {
        try {
            $this->equipment->update($id,$request->validated());
            return $this->successRoute('equipments.index','Equipment updated');
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
        try {
            $this->equipment->delete($id);
            return $this->success('Equipment deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }


}
