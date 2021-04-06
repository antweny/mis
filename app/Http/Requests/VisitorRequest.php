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
            'location_id' => ['nullable','integer'],
            'organization_id' => ['nullable','integer'],
            'employee_id' => ['required','integer'],
            'check_in' => ['required','date_format:H:i'],
            'check_out' => ['nullable','date_format:H:i','after_or_equal:check_in'],
            'desc' => ['required','string'],
            'date' => ['required','date']
        ];
    }
}
