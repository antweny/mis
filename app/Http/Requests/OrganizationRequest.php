<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
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
                    'name' => ['required','string','max:191','unique:organizations,name'],
                    'acronym' => ['nullable','string','max:15'],
                    'organization_category_id'=>['nullable','string'],
                    'founded'=>['nullable','numeric'],
                    'location_id'=>['nullable'],
                    'mobile' => ['nullable'],
                    'telephone' => ['nullable'],
                    'website' => ['nullable','url'],
                    'email'=>['nullable','email'],
                    'fax' => ['nullable'],
                    'address' =>['nullable','string'],
                ];
            }

            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:191','unique:organizations,id,'.$this->id],
                    'acronym' => ['nullable','string','max:15'],
                    'organization_category_id'=>['nullable','string'],
                    'founded'=>['nullable','numeric'],
                    'location_id'=>['nullable'],
                    'mobile' => ['nullable'],
                    'telephone' => ['nullable'],
                    'website' => ['nullable','url'],
                    'email'=>['nullable','email'],
                    'fax' => ['nullable'],
                    'address' =>['nullable','string'],
                ];
            }
        }
    }
}
