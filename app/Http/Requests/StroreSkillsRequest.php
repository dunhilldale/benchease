<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreSkillsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title"        => "required|min:2|max:100|unique:skills,title",
        ];
    }

    /**
     * Naming the attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            "title"        => "Skill Name",
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please enter the name/title of the skill',
            "title.min" => "The name/title has to have at least :min characters.",
            "title.max" => "The name/title has to have no more than :max characters.",
            "title.unique" => "The skill has already been added.",
        ];
    }
}
