<?php

namespace App\Rules\Genre;

use App\Models\Genre;
use Illuminate\Contracts\Validation\Rule;

class GenreExistsRule implements Rule
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
        return Genre::where('id', $value)->exists();
    }

    public function message(): string
    {
        return ":attribute c id $this->id не найден";
    }
}
