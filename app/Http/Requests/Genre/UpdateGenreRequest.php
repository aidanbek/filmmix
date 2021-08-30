<?php

namespace App\Http\Requests\Genre;

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
            'title' => ['required', 'string', 'max:255'],
            'films' => ['nullable', 'array', 'exists:films,id']
        ];
    }
}
