<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenderSeriesRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'topic' => ['required','string','unique:gender_series,topic'],
                    'employee_id' => ['required','integer'],
                    'facilitators' => ['required','array'],
                    'date' => ['required','date'],
                    'status' => ['nullable','string'],
                    'desc' => ['nullable','string'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'topic' => ['required','string','unique:gender_series,id,'.$this->id],
                    'employee_id' => ['required','integer'],
                    'facilitators' => ['required','array'],
                    'date' => ['required','date'],
                    'status' => ['nullable','string'],
                    'desc' => ['nullable','string'],
                ];
            }
        }
    }
}
