<?php

namespace App\Rules\Actor;

use App\Models\Actor;
use Illuminate\Contracts\Validation\Rule;

class ActorExistsRule implements Rule
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
        return Actor::where('id', $value)->exists();
    }

    public function message(): string
    {
        return ":attribute c id $this->id не найден";
    }
}
