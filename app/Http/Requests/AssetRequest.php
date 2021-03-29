<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
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
            'equipment_id' => ['required','integer'],
            'serial_no' => ['required','string'],
            'code_number' => ['nullable','string'],
            'item_unit_id' => ['nullable','integer'],
            'date' => ['nullable','date'],
            'remarks' => ['nullable','string'],
        ];
    }
}
