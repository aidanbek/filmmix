<?php

namespace App\Rules\Country;

use Illuminate\Contracts\Validation\Rule;

class CountryTitleHasProperLengthRule implements Rule
{
    /**
     * @var int
     */
    private $length;

    public function __construct($length = 255)
    {
        $this->length = $length;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return mb_strlen($value) <= $this->length;
    }

    public function message(): bool
    {
        return "Название страны содержит больше $this->length символов";
    }
}
