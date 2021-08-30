<?php

namespace App\Rules\Director;

use App\Models\Director;
use Illuminate\Contracts\Validation\Rule;

class DirectorExistsRule implements Rule
{
    /**
     * @var string
     */
    private $id;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->id = $value;
        return Director::where('id', $value)->exists();
    }

    public function message(): string
    {
        return ":attribute c id $this->id не найден";
    }
}
