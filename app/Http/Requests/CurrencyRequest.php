<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
                    'name' => ['required','string','max:255','unique:currencies,name,'],
                    'acronym' => ['string','required','max:5'],
                    'symbol' => ['string','required','max:3'],
                    'main' => ['required','boolean'],
                    'desc' => ['string','nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:255','unique:currencies,id,'.$this->id],
                    'acronym' => ['string','required','max:5'],
                    'symbol' => ['string','required','max:3'],
                    'main' => ['required','boolean'],
                    'desc' => ['string','nullable'],
                ];
            }
        }
    }
}
