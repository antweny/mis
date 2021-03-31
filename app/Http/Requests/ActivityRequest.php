<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'output_id' => ['integer','required'],
            'status' => ['string','required'],
            'desc' => ['string','required'],
            'employee_id' => ['integer','required'],
            'start_date' => ['date','required'],
            'due_date' => ['date','required','after_or_equal:start_date'],
            'parent_id' => ['integer','nullable'],
            'projects' => ['required','array'],
        ];
    }
}
