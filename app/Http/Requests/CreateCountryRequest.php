<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
            'parent_id' => 'required|integer',
            'web_data_id' => 'nullable|integer',
            'title' => 'required|string',
            'link' => 'required|string|alpha_dash|unique:newspapers_countries',
            'code' => 'nullable|string',
            'body' => 'nullable|string',
            'flag' => 'nullable|mimes:png,jpg,jpeg|max:5120',
            'flag_alt' => 'nullable|string',
            'flag_info' => 'nullable|string',
            'active' => 'nullable|integer'
        ];
    }
}
