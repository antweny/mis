<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use Exception;

class BrandController extends AuthController
{
    /**
     * @var
     */
    private $brandService;

    /**
     * BrandController constructor.
     */
    public function __construct(BrandService $brandService)
    {
        parent::__construct();
        $this->brandService = $brandService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->brandService->model());

        try {
            $brands = $this->brandService->get();  //Get all brands
            return view('brands.index',compact('brands'));
        }
        catch (Exception $e) {
            dd($e->getMessage());
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $this->canCreate($this->brandService->model());

        try {
            $this->brandService->create($request->validated());
            return $this->success('Brand created');
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
        $this->canUpdate($this->brandService->model());

        try {
            $brand = $this->brandService->find($id);
            return view('brands.edit',compact('brand'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, $id)
    {
        $this->canUpdate($this->brandService->model());

        try {
            $this->brandService->update($id,$request->validated());
            return $this->successRoute('brands.index','Brand updated');
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
        $this->canDelete($this->brandService->model());

        try {
            $this->brandService->delete($id);
            return $this->success('Brand deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
