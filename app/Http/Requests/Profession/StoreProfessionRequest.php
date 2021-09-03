<?php

namespace App\Http\Requests\Profession;

use App\Rules\Profession\ProfessionTitleHasProperLengthRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreProfessionRequest
 * @package App\Http\Requests\Profession
 * @property string $title
 * @property string[] $films
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
            'title' => ['bail', 'required', 'string', new ProfessionTitleHasProperLengthRule()]
        ];
    }
}
