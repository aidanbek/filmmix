<?php

namespace App\Rules\User;

use Illuminate\Contracts\Validation\Rule;

class UserTitleHasProperLengthRule implements Rule
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
        return "ФИО человека содержит больше $this->length символов";
    }
}
