<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckOldPasswordRule implements Rule
{

    /**
     * Create a new rule instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value,auth()->user()->password);
    }


    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The Old password didn\'t match.';
    }


}
