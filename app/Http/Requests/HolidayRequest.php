<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest
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
                    'name' => ['required','string'],
                    'date' => ['required','date'],
                    'repeat' => ['required','boolean'],
                    'desc' => ['nullable','string'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string',$this->id],
                    'date' => ['required','date'],
                    'repeat' => ['required','boolean'],
                    'desc' => ['nullable','string'],
                ];
            }
        }


    }
}
