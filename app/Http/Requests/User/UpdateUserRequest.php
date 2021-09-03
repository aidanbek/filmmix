<?php

namespace App\Http\Requests\User;

use App\Rules\User\UserTitleHasProperLengthRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateUserRequest
 * @package App\Http\Requests\User
 * @property string $title
 * @property string[] $films
 */
class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'string', new UserTitleHasProperLengthRule()]
        ];
    }
}
