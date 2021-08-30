<?php

namespace App\Http\Requests\Film;

use App\Rules\Actor\ActorExistsRule;
use App\Rules\Director\DirectorExistsRule;
use App\Rules\Film\FilmProductionYearBetweenDatesRule;
use App\Rules\Film\FilmTitleHasProperLengthRule;
use App\Rules\Genre\GenreExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateFilmRequest
 * @package App\Http\Requests\Film
 * @property string $title
 * @property string $prod_year
 * @property string[] $actors
 * @property string[] $directors
 * @property string[] $genres
 */
class UpdateFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new FilmTitleHasProperLengthRule()],
            'prod_year' => ['bail', 'required', 'integer', new FilmProductionYearBetweenDatesRule()],
            'actors' => ['nullable', 'array'],
            'actors.*' => ['bail', 'required', 'integer', new ActorExistsRule()],
            'directors' => ['nullable', 'array'],
            'directors.*' => ['bail', 'required', 'integer', new DirectorExistsRule()],
            'genres' => ['nullable', 'array'],
            'genres.*' => ['bail', 'required', 'integer', new GenreExistsRule()]
        ];
    }
}
