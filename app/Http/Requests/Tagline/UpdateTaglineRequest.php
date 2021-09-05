<?php

namespace App\Http\Requests\Tagline;

use App\Rules\Film\FilmExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateTaglineRequest
 * @package App\Http\Requests\Tagline
 * @property string $text
 * @property string $original_text
 * @property string[] $films
 */
class UpdateTaglineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => ['required', 'string'],
            'original_text' => ['required', 'string'],
            'films' => ['nullable', 'array'],
            'films.*' => ['bail', 'required', 'integer', new FilmExistsRule()]
        ];
    }
}
