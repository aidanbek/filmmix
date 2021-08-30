<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreFilmRequest
 * @package App\Http\Requests\Film
 * @property string $title
 * @property string $prod_year
 * @property string[] $actors
 * @property string[] $directors
 * @property string[] $genres
 */
class StoreFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'prod_year' => ['required', 'integer', 'min:1800', 'max:3000'],
            'actors' => ['nullable', 'array', 'exists:users,id'],
            'directors' => ['nullable', 'array', 'exists:users,id'],
            'genres' => ['nullable', 'array', 'exists:genres,id']
        ];
    }
}
