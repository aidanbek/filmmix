<?php

namespace App\Http\Requests\Actor;

use App\Rules\Actor\ActorTitleHasProperLengthRule;
use App\Rules\Country\CountryExistsRule;
use App\Rules\Film\FilmExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreActorRequest
 * @package App\Http\Requests\Actor
 * @property string $title
 * @property string[] $films
 * @property string[]|null $countries
 * @property string|null $birth_date
 */
class StoreActorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new ActorTitleHasProperLengthRule()],
            'films' => ['nullable', 'array'],
            'films.*' => ['bail', 'required', 'integer', new FilmExistsRule()],
            'countries' => ['nullable', 'array'],
            'countries.*' => ['bail', 'required', 'integer', new CountryExistsRule()],
            'birth_date' => ['nullable', 'date']
        ];
    }
}
