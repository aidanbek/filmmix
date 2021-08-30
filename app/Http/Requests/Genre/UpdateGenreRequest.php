<?php

namespace App\Http\Requests\Genre;

use App\Rules\Film\FilmExistsRule;
use App\Rules\Genre\GenreTitleHasProperLengthRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateGenreRequest
 * @package App\Http\Requests\Genre
 * @property string $title
 * @property string[] $films
 */
class UpdateGenreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new GenreTitleHasProperLengthRule()],
            'films' => ['nullable', 'array'],
            'films.*' => ['bail', 'required', 'integer', new FilmExistsRule()]
        ];
    }
}
