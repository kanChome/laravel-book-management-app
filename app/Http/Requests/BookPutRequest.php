<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPutRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'price' => 'numeric|min:1|max:9999999',
            'authors' => 'required|array',
            'authors.*' => 'required|exists:authors,id',
        ];
    }
}
