<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetRequest;
use App\Services\AssetService;
use Exception;
use Spatie\DbDumper\DbDumper;

class AssetController extends AuthController
{
    /**
     * @var
     */
    private $assetService;

    /**
     * AssetController constructor.
     */
    public function __construct(AssetService $assetService)
    {
        parent::__construct();
        $this->assetService = $assetService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->canView($this->assetService->model());

        try {
            $assets = $this->assetService->get();  //Get all assets
            return view('asset.index',compact('assets'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssetRequest $request)
    {
        $this->canCreate($this->assetService->model());

        try {
            $this->assetService->create($request->validated());
            return $this->success('Asset created');
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
        $this->canUpdate($this->assetService->model());

        try {
            $asset = $this->assetService->find($id);
            return view('asset.edit',compact('asset'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssetRequest $request, $id)
    {
        $this->canUpdate($this->assetService->model());

        try {
            $this->assetService->update($id,$request->validated());
            return $this->successRoute('assets.index','Asset updated');
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
        $this->canDelete($this->assetService->model());

        try {
            $this->assetService->delete($id);
            return $this->success('Asset deleted');
        }
        catch (Exception $e) {
            return $this->error();
        }
    }


}
