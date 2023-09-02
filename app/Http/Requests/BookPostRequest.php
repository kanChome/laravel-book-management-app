<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
{
    /**
     * ログイン中のユーザーが対象のレコードの更新権限を持っているかどうかを確認する。
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * パラメータの内容に不備がないかどうかを確認する。
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|unique:books|max:255',
            'price' => 'numeric|min:1|max:9999999',
        ];
    }
}
