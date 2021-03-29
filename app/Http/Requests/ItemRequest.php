<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
                    'name' => ['required','string','max:255','unique:items,name'],
                    'item_category_id' => ['integer','nullable'],
                    'item_unit_id' => ['integer','nullable'],
                    'order_level' => ['required','numeric'],
                    'quantity' => ['required','numeric'],
                    'desc' => ['string','nullable'],
                ];
            }

            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:255','unique:items,id,'.$this->id],
                    'item_category_id' => ['integer','nullable'],
                    'item_unit_id' => ['integer','nullable'],
                    'order_level' => ['required','numeric'],
                    'quantity' => ['required','numeric'],
                    'desc' => ['string','nullable'],
                ];
            }
        }
    }
}
