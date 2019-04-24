<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
class SponsorExist implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $sponsorSearch = User::where('name', 'LIKE', $value)->first();
        
        if($sponsorSearch)
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
        return 'Sponsor Doesnt Exist';
    }
}
