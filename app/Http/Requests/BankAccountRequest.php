<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountRequest extends FormRequest
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
            'name' => ['required','string'],
            'stakeholder_id' => ['required','integer'],
            'number' => ['required','string'],
            'balance' => ['nullable','numeric'],
            'currency_id' => ['required','integer'],
            'op' => ['nullable','date'],
            'desc' => ['nullable','string'],
        ];
    }
}
