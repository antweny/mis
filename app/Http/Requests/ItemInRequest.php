<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'received_at' => ['required','date'],
            'item_id' => ['required','integer'],
            'desc' => ['required','string'],
            'unit_rate' => ['required','numeric'],
            'quantity_in' => ['required','integer'],
            'remarks' => ['string','nullable'],
        ];
    }
}
