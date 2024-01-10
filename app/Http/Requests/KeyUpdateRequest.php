<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeyUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:400'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
