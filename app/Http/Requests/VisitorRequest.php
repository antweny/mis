<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
        return [
            'individual_id' => ['required','integer'],
            'place' => ['required','string'],
            'company' => ['nullable','string'],
            'employee_id' => ['required','integer'],
            'check_in' => ['required','date'],
            'check_out' => ['nullable','date','after:check_in'],
            'desc' => ['required','string'],
        ];
    }
}
