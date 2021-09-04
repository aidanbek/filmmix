<?php

namespace App\Http\Requests\Profession;

use App\Rules\Profession\ProfessionTitleHasProperLengthRule;
use App\Rules\User\UserExistsRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreProfessionRequest
 * @package App\Http\Requests\Profession
 * @property string $title
 * @property string[] $films
 * @property string[] $users
 */
class StoreProfessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new ProfessionTitleHasProperLengthRule()],
            'users' => ['nullable', 'array'],
            'users.*' => ['bail', 'required', 'integer', new UserExistsRule()]
        ];
    }
}
