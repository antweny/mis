<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'isActive' => ['boolean','required'],
            'desc' => ['required','required'],
            'stakeholder_id' => ['integer','required'],
            'start_date' => ['date','required'],
            'end_date' => ['date','required','after_or_equal:start_date'],
            'coordinators' => ['array','required'],
            'reporting_period' => ['string','required'],
        ];
    }
}
