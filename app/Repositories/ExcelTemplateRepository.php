<?php

namespace App\Repositories;

use App\Models\ExcelTemplate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExcelTemplateRepository extends BaseRepository
{
    protected $path;

    public function __construct(ExcelTemplate $model)
    {
        parent::__construct($model);
//        $this->path = storage_path('storage/templates/excel/');
        $this->path = storage_path('app/public/templates/excel/');
    }

    /**
     * Create new excel templates
     */
    public function createUpload($request)
    {
        DB::beginTransaction();
        try {
            $request['path'] = $this->upload($request['imported_file']);
            $this->model->create($request->only('name','path','desc'));
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            dd($e->getMessage());
            DB::commit();
            return false;
        }
    }


    /**
     * Move upload file to destination folder
     */
    public function upload($file)
    {
        $fileName = time().'.'.$file->extension();
       $file->move($this->path,$fileName);
//        Storage::disk('templates')->putFile('excel',$fileName);
        return $fileName;
    }

    /**
     * Move upload file to destination folder
     */
    public function download($file_name)
    {
        $filePath = $this->path.''.$file_name;
        if (file_exists($filePath)) {
            $headers = array(
                'Content-Type: application/pdf',
            );
            return \Response::download($filePath, $file_name, $headers);
        }
        else {
            return false;
        }
    }



    /**
     * @param $request
     * @return bool
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $object = $this->find($id);
            $this->deleteFile($object->path);
            $object->delete();
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::commit();
            return false;
        }
    }

    /**
     * Delete File
     */
    private function deleteFile($file)
    {
        $filePath = $this->path.''.$file;
        if(file_exists($filePath)) {
            Storage::disk('excelTemplates')->delete($file);
            return true;
        }
        return null;
    }


}
