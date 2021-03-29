<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveApplicationRequest extends FormRequest
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
            'send_to' => ['required','integer'],
            'leave_type_id' => ['required','integer'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date','after_or_equal:start_date'],
            'desc' => ['nullable','string'],
        ];
    }
}
