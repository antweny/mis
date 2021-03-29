<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'payment_no'=> ['required'],
            'date'=> ['required','date'],
            'payment_type'=> ['required'],
            'payee_id'=> ['required'],
            'bank_account_id'=> ['required'],
            'amount'=> ['required'],
            'amount_words'=> ['required'],
        ];
    }
}
