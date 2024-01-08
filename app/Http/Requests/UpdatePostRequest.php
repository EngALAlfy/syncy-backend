<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "name" => "required|max:250",
            "image" => "nullable|image|max:1024",
            "short_desc" => "nullable|max:500",
            "price" => "nullable|min:0",
            "desc" => "nullable|max:5000",
            "owner_id" => "required|exists:users,id",
            "custom_email" => "nullable|email|max:150",
            "custom_phone" => "nullable|max:14",
            "state_id" => "required|exists:states,id",
            "category_id" => "required|exists:categories,id",
        ];
    }
}
