<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
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
            'is_a_parent' => 'required|boolean',
            'parent_id' => 'required_if:is_a_parent,==,false',
            'menu_id' => 'required|integer',
            'web_data_id' => 'nullable|integer',
            'title' => 'required|string',
            'class' => 'nullable|string',
            'link' => 'required|string|alpha_dash|unique:newspapers_links',
            'description' => 'nullable|string',
            'body' => 'nullable|string'
        ];
    }
}
