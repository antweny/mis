<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetTypeRequest;
use App\Services\AssetTypeService;
use Exception;

class AssetTypeController extends AuthController
{

    /**
     * @var
     */
    protected $assetTypeService;

    /**
     * AssetTypeController constructor.
     */
    public function __construct(AssetTypeService $assetTypeService)
    {
        parent::__construct();
        $this->assetTypeService = $assetTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $assetTypes = $this->assetTypeService->get();  //Get all assetTypes
            return view('asset-types.index',compact('assetTypes'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetTypeRequest $request)
    {
        try {
            $this->assetTypeService->create($request->validated());
            return $this->success('Asset Type created');
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
        try {
            $assetType = $this->assetTypeService->find($id);
            return view('asset-types.edit',compact('assetType'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetTypeRequest $request, $id)
    {
        try {
            $this->assetTypeService->update($id,$request->validated());
            return $this->successRoute('assetTypes.index','Asset Type updated');
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
            $this->assetTypeService->delete($id);
            return $this->success('Asset Type deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
