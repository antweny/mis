<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportFileRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'import_file' => ['required','file'],
        ];
    }

    public function messages()
    {
        return [
            'import_file.mimes' => 'File must be an xls, xlsx or csv File',
        ];
    }
}
