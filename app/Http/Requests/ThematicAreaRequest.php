<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThematicAreaRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'parent_id' => ['nullable','integer'],
            'desc' => ['string','nullable'],
        ];
    }
}
