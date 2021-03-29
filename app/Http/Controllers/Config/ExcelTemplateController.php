<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\AuthController;
use App\Http\Requests\ExcelTemplateRequest;
use App\Repositories\ExcelTemplateRepository;
use Exception;

class ExcelTemplateController extends AuthController
{
    /**
     * @var ExcelTemplateRepository
     */
    protected $excel;

    /**
     * ExcelTemplateController constructor.
     * @param ExcelTemplateRepository $excel
     */
    public function __construct(ExcelTemplateRepository $excel)
    {
        parent::__construct();
        $this->excel = $excel;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $templates = $this->excel->get();
            return view('config.templates.excel.index',compact('templates'));
        }
        catch (Exception $e) {
            return $this->error();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExcelTemplateRequest $request)
    {
        $data = $this->excel->createUpload($request);
        if($data) {
            return $this->success($request['name'].' excel file has been added');
        }
        else {
            return $this->errorWithInput($request);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function download($file)
    {
        $data = $this->excel->download($file);
        if($data) {
            return $this->success('File Downloaded');
        }
        else {
            return $this->error('file not exists');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->excel->delete($id);
            return $this->success('File deleted');
        }
        catch (\Exception $e) {
            return $this->error();
        }
    }



}
