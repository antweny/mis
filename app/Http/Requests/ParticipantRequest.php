<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
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
            'event_id' => ['required', 'integer'],
            'individual_id' => ['required', 'integer'],
            'organization_id' => ['nullable', 'nullable'],
            'participant_role_id' => ['integer', 'nullable'],
            'individual_group_id' => ['nullable', 'integer'],
            'location_id' => ['nullable', 'integer'],
            'level' => ['nullable', 'string', 'max:2'],
            'date' => ['required', 'date'],
        ];

    }
}
