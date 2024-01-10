<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AaccountStoreRequest extends FormRequest
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
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:12'],
            'password' => ['required', 'password', 'max:100'],
            'login_url' => ['nullable', 'url' , 'string', 'max:500'],
            'image' => ['nullable', 'string', 'max:400'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
