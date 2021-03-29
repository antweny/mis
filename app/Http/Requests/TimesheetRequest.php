<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetRequest extends FormRequest
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
            'activity_id' => ['nullable','integer'],
            'time_from' => ['required','date_format:H:i'],
            'time_to' => ['required','date_format:H:i','after_or_equal:time_from'],
            'desc' => ['required','string'],
        ];
    }
}
