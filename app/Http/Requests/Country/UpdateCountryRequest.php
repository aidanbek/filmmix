<?php

namespace App\Http\Requests\Country;

use App\Rules\Country\CodeHasProperLengthRule;
use App\Rules\Country\CountryTitleHasProperLengthRule;
use App\Rules\Film\FilmExistsRule;
use App\Rules\User\UserExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateCountryRequest
 * @package App\Http\Requests\Country
 * @property string $title
 * @property string $code
 * @property string[] $films
 * @property string[] $users
 */
class UpdateCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new CountryTitleHasProperLengthRule()],
            'code' => ['required', 'string', new CodeHasProperLengthRule()],
            'films' => ['nullable', 'array'],
            'films.*' => ['bail', 'required', 'integer', new FilmExistsRule()],
            'users' => ['nullable', 'array'],
            'users.*' => ['bail', 'required', 'integer', new UserExistsRule()],
        ];
    }
}
