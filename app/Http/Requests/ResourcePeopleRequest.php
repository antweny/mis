<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourcePeopleRequest extends FormRequest
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
            'individual_id' => ['required','integer'],
            'individual_group_id' => ['required','integer'],
            'start_date' => ['nullable','date'],
            'end_date' => ['nullable','date','after_or_equal:start_date'],
            'desc' => ['nullable','string'],
        ];
    }
}
