<?php

namespace App\Http\Requests\Film;

use App\Rules\Actor\ActorExistsRule;
use App\Rules\Country\CountryExistsRule;
use App\Rules\Director\DirectorExistsRule;
use App\Rules\Film\FilmProductionYearBetweenDatesRule;
use App\Rules\Film\FilmTitleHasProperLengthRule;
use App\Rules\Genre\GenreExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchFilmsRequest
 * @package App\Http\Requests\Film
 * @property string|null $title
 * @property string|null $prod_year
 * @property string[]|null $actors
 * @property string[]|null $directors
 * @property string[]|null $genres
 * @property string[]|null $countries
 */
class SearchFilmsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'nullable', 'string', new FilmTitleHasProperLengthRule()],
            'prod_year' => ['bail', 'nullable', 'integer', new FilmProductionYearBetweenDatesRule()],
            'actors' => ['nullable', 'array'],
            'actors.*' => ['bail', 'required', 'integer', new ActorExistsRule()],
            'directors' => ['nullable', 'array'],
            'directors.*' => ['bail', 'required', 'integer', new DirectorExistsRule()],
            'genres' => ['nullable', 'array'],
            'genres.*' => ['bail', 'required', 'integer', new GenreExistsRule()],
            'countries' => ['nullable', 'array'],
            'countries.*' => ['bail', 'required', 'integer', new CountryExistsRule()]
        ];
    }
}
