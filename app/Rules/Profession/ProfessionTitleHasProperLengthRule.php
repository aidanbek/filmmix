<?php

namespace App\Rules\Profession;

use Illuminate\Contracts\Validation\Rule;

class ProfessionTitleHasProperLengthRule implements Rule
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
        return "Название профессии содержит больше $this->length символов";
    }
}
