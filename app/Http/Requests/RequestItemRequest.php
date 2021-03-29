<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestItemRequest extends FormRequest
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
           'item_id' => ['required'],
           'req_quantity' => ['required','numeric'],
           'desc' => ['string','nullable'],
       ];
    }
}
