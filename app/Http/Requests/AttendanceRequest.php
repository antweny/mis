<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'date' => ['required','date'],
            'employee_id' => ['required','integer'],
            'time_in' => ['required','date_format:H:i'],
            'time_out' => ['required','date_format:H:i','after_or_equal:time_in'],
        ];
    }
}
