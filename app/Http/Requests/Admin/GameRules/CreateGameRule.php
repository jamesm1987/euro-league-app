<?php

namespace App\Http\Requests\Admin\GameRules;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => 'required|min:3',
            'context' => 'required|min:3',
            'description' => 'min:6',
            'margin' => 'nullable|numeric',
            'points' => 'required',
            'active' => 'boolean'
        ];
    }
}
