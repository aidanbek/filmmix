<?php

namespace App\Http\Requests\Director;

use App\Rules\Director\DirectorTitleHasProperLengthRule;
use App\Rules\Film\FilmExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreDirectorRequest
 * @package App\Http\Requests\Director
 * @property string $title
 * @property string[] $films
 * @property string|null $birth_date
 */
class StoreDirectorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new DirectorTitleHasProperLengthRule()],
            'films' => ['nullable', 'array'],
            'films.*' => ['bail', 'required', 'integer', new FilmExistsRule()],
            'birth_date' => ['nullable', 'date']
        ];
    }
}
