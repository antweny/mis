<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StakeholderRequest extends FormRequest
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
            'organization_id' => ['required','integer'],
            'organization_group_id' => ['required','integer'],
            'start_date' => ['required','date'],
            'end_date' => ['nullable','date','after_or_equal:start_date'],
            'desc' => ['nullable','string'],
        ];
    }
}
