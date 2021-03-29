<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
                    'name' => ['required','string','unique:events,name'],
                    'parent_id' => ['nullable','integer'],
                    'event_category_id' => ['required','integer'],
                    'organisers' => ['required','array'],
                    'facilitators' => ['required','array'],
                    'coordinators' => ['required','array'],
                    'start_date' => ['required','date'],
                    'end_date' => ['nullable','date','after_or_equal:start_date'],
                    'desc' => ['required','string'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required','string','unique:events,id,'.$this->id],
                    'parent_id' => ['nullable','integer'],
                    'event_category_id' => ['required','integer'],
                    'organisers' => ['required','array'],
                    'facilitators' => ['required','array'],
                    'coordinators' => ['required','array'],
                    'start_date' => ['required','date'],
                    'end_date' => ['nullable','date','after_or_equal:start_date'],
                    'desc' => ['required','string'],
                ];
            }
        }
    }
}
