<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        $articleId = $this->route('id') ?? $this->route('article');
        return [
            'name' => "required|unique:articles,name,{$articleId}",
            'body' => 'required|min:100', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название статьи обязательно для заполнения',
            'name.unique' => 'Статья с таким названием уже существует',
            'body.required' => 'Текст статьи обязателен для заполнения',
            'body.min' => 'Текст статьи должен быть не менее :min символов'
        ];
    }
}
