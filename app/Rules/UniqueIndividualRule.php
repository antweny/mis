<?php

namespace App\Rules;

use App\Models\Individual;
use Illuminate\Contracts\Validation\Rule;

class UniqueIndividualRule implements Rule
{
    private $mobile;

    public function __construct($mobile = null)
    {
        $this->mobile = $mobile;
    }

    /* Determine if the validation rule passes */
    public function passes($attribute, $value)
    {
        return Individual::uniqueIndividual($value,$this->mobile);
    }

    /* Get the validation error message */
    public function message()
    {
        return 'The user is already exists';
    }
}
