<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchFilmsRequest
 * @package App\Http\Requests\Film
 * @property string|null $title
 * @property string|null $prod_year
 * @property string[]|null $actors
 * @property string[]|null $directors
 * @property string[]|null $genres
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
            'title' => ['nullable', 'string', 'max:255'],
            'prod_year' => ['nullable', 'integer', 'min:1800', 'max:3000'],
            'actors' => ['nullable', 'array', 'exists:users,id'],
            'directors' => ['nullable', 'array', 'exists:users,id'],
            'genres' => ['nullable', 'array', 'exists:genres,id']
        ];
    }
}
