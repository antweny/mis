<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndividualRequest extends FormRequest
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
            'sex' => ['nullable','max:10','string'],
            'age_group' => ['nullable','string'],
            'occupation' => ['nullable','string'],
            'place'=>['nullable','string'],
            'mobile' => ['nullable','numeric'],
            'address' => ['nullable','string'],
            'email' => ['nullable','email','max:100'],
            'individual_groups' => ['nullable','array'],
        ];
    }
}
