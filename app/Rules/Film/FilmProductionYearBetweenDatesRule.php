<?php

namespace App\Rules\Film;

use Illuminate\Contracts\Validation\Rule;

class FilmProductionYearBetweenDatesRule implements Rule
{
    /**
     * @var int
     */
    private $start;
    /**
     * @var int
     */
    private $end;

    public function __construct($start = 1800, $end = 3000)
    {
        $this->start = $start;
        $this->end = $end;
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
        return $value >= $this->start && $value <= $this->end;
    }

    public function message(): bool
    {
        return "Год выхода фильма находится вне рамок: $this->start и $this->end";
    }
}
