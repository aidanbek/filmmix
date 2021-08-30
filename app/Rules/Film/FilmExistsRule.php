<?php

namespace App\Rules\Film;

use App\Models\Film;
use Illuminate\Contracts\Validation\Rule;

class FilmExistsRule implements Rule
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
        return Film::where('id', $value)->exists();
    }

    public function message(): string
    {
        return ":attribute c id $this->id не найден";
    }
}
