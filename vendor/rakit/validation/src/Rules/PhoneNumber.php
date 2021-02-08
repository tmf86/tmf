<?php

namespace Rakit\Validation\Rules;

use Rakit\Validation\Rule;

class PhoneNumber extends Rule
{


    /** @var string */
    protected $message = "The :attribute must be a phone number";

    /**
     * Check the value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
       $value = (string) $value;
       return (strlen($value) === 8 || strlen($value)===10 );
    }
}
