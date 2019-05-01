<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ActivationCode;
class ValidActivationCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $codesearch = ActivationCode::where('ActivationCode', 'LIKE', $value)->first();
        
        if($codesearch)
        {
            return true;

        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Activation Code';
    }
}
