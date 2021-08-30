<?php

namespace App\Http\Requests\Actor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreActorRequest
 * @package App\Http\Requests\Actor
 * @property string $title
 * @property string[] $films
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
            'title' => ['required', 'string','max:255'],
            'films' => ['nullable', 'array', 'exists:films,id'],
            'birth_date' => ['nullable', 'date']
        ];
    }
}
