<?php

namespace App\Http\Requests\Director;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateDirectorRequest
 * @package App\Http\Requests\Director
 * @property string $title
 * @property string[] $films
 * @property string|null $birth_date
 */
class UpdateDirectorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string','max:255'],
            'films' => ['nullable', 'array', 'exists:films,id'],
            'birth_date' => ['nullable', 'date']
        ];
    }
}
