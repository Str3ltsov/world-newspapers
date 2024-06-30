<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'web_data_id' => 'nullable|integer',
            'title' => 'required|string',
            'link' => 'required|string',
            'code' => 'nullable|string',
            'body' => 'nullable|string',
            'flag' => 'nullable|mimes:png,jpg,jpeg|max:5120',
            'flag_alt' => 'nullable|string',
            'flag_info' => 'nullable|string',
            'active' => 'nullable|integer'
        ];
    }
}
