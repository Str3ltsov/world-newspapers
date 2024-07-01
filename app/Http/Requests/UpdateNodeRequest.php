<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'type_id' => 'required|integer',
            'title' => 'required|string',
            'slug' => 'required|string',
            'path' => 'required|string',
            'body' => 'nullable|string',
            'excerpt' => 'nullable|string'
        ];
    }
}
