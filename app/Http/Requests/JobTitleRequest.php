<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobTitleRequest extends FormRequest
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
                    'name' => ['required','string','max:255','unique:job_titles,name,'],
                    'desc' => ['string','nullable'],
                    'type' => ['string','nullable','max:2'],
                    'acronym' => ['string','nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:255','unique:job_titles,id,'.$this->id],
                    'desc' => ['string','nullable'],
                    'type' => ['string','nullable','max:2'],
                    'acronym' => ['string','nullable'],
                ];
            }
        }
    }
}
