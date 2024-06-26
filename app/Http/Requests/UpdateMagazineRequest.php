<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMagazineRequest extends FormRequest
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
            'link_id' => 'required|integer|min:1',
            'title' => 'required|string',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'cover' => 'nullable|mimes:png,jpg,jpeg|max:5120',
            'cover_alt' => 'nullable|string',
            'active' => 'nullable|integer',
            'date' => 'nullable|date'
        ];
    }
}
