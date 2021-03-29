<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemOutRequest extends FormRequest
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
            'issued_at' => ['required','date'],
            'stock_quantity' => ['required','numeric'],
            'req_quantity' => ['required','numeric'],
            'quantity_out' => ['required','numeric','lte:stock_quantity', 'lte:req_quantity'],
            'remarks' => ['string','nullable'],
        ];
    }
}
