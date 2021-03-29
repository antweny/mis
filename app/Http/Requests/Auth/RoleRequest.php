<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                    'name' => ['required','string','max:255','unique:roles,name'],
                    'permissions' => ['nullable'],
                    'desc' => ['string','nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
            return [
                'name' => ['required','string','max:255','unique:roles,id,'.$this->id],
                'permissions' => ['nullable'],
                'desc' => ['string','nullable'],
            ];
            }
        }
    }
}
