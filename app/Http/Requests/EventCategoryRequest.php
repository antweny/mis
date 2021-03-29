<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCategoryRequest extends FormRequest
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
                    'name' => ['required','string','max:255','unique:event_categories,name'],
                    'sort' => ['nullable','integer'],
                    'desc' => ['string','nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','max:255','unique:event_categories,id,'.$this->id],
                    'sort' => ['nullable','integer'],
                    'desc' => ['nullable','string'],
                ];
            }
        }
    }
}
