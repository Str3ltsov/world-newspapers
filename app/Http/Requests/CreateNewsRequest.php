<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'news_type' => 'required|integer',
            'link_id' => 'required_if:news_type,==,1',
            'country_id' => 'required_if:news_type,==,2',
            'title' => 'required|string',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:5120',
            'logo_alt' => 'nullable|string',
            'date' => 'nullable|date',
            'active' => 'nullable|integer'
        ];
    }
}
