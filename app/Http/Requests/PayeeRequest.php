<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayeeRequest extends FormRequest
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
            'name' => ['required','string','max:100'],
            'mobile' => ['required','numeric'],
            'address' => ['nullable','string'],
            'email' => ['nullable','email','max:100'],
            'group' => ['nullable','string'],
        ];
    }
}
