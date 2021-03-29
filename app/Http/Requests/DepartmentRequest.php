<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => ['required','string','max:255','unique:departments,name'],
                    'desc' => ['string','nullable'],
                    'acronym' => ['string','nullable'],
                    'manager' => ['integer','nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:255','unique:departments,id,'.$this->id],
                    'desc' => ['string','nullable'],
                    'acronym' => ['string','nullable'],
                    'manager' => ['integer','nullable'],
                ];
            }
        }
    }
}
