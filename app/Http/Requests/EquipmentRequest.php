<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'brand_id' => ['required','integer'],
            'model' => ['required','string'],
            'asset_type_id' => ['required','integer'],
            'desc' => ['nullable','string'],
        ];
    }
}
