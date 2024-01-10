<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoStoreRequest extends FormRequest
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
            'task' => ['required', 'string', 'max:500'],
            'project_name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:pending,successful,failed'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
