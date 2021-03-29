<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        switch ($this->method()) {

            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'employee_no' => ['required', 'string', 'unique:employees,employee_no'],
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:employees,email'],
                    'mobile' => ['required','numeric'],
                    'job_type_id' => ['required', 'integer'],
                    'department_id' => ['required', 'integer'],
                    'user_id' => ['nullable', 'integer'],
                    'designation_id' => ['required', 'integer'],
                    'location_id' => ['required', 'integer'],
                    'sex' => ['required', 'string'],
                    'active' => ['required', 'boolean'],
                    'marital_status' => ['nullable', 'string'],
                    'children' => ['nullable', 'integer'],
                    'dob' => ['required', 'date'],
                ];
            }

            case 'PUT':
            case 'PATCH':
            {
                return [
                    'employee_no' => ['required', 'string', 'unique:employees,id,'.$this->id],
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'email', 'unique:employees,id,'.$this->id],
                    'mobile' => ['required','numeric'],
                    'job_type_id' => ['required', 'integer'],
                    'department_id' => ['required', 'integer'],
                    'user_id' => ['nullable', 'integer'],
                    'designation_id' => ['required', 'integer'],
                    'location_id' => ['required', 'integer'],
                    'sex' => ['required', 'string'],
                    'active' => ['required', 'boolean'],
                    'marital_status' => ['nullable', 'string'],
                    'children' => ['nullable', 'integer'],
                    'dob' => ['required', 'date'],
                ];
            }
        }
    }


}
