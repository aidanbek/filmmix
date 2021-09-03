<?php

namespace App\Http\Requests\Film;

use App\Rules\Country\CountryExistsRule;
use App\Rules\Film\FilmProductionYearBetweenDatesRule;
use App\Rules\Film\FilmTitleHasProperLengthRule;
use App\Rules\Genre\GenreExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateFilmRequest
 * @package App\Http\Requests\Film
 * @property string $title
 * @property string $prod_year
 * @property string[] $genres
 * @property string[]|null $countries
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
            'genres' => ['nullable', 'array'],
            'genres.*' => ['bail', 'required', 'integer', new GenreExistsRule()],
            'countries' => ['nullable', 'array'],
            'countries.*' => ['bail', 'required', 'integer', new CountryExistsRule()]
        ];
    }
}
