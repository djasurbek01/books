<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'status' => 'boolean',
            'cover_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Название книги обязательно.',
            'title.string' => 'Название книги должно быть строкой.',
            'title.max' => 'Максимальная длина названия — 255 символов.',
            'cover_url.image' => 'Файл должен быть изображением.',
            'cover_url.mimes' => 'Допустимые форматы: jpg, jpeg, png.',
            'cover_url.max' => 'Максимальный размер файла — 2MB.',
            'genres.required' => 'Выберите хотя бы один жанр.',
            'genres.array' => 'Жанры должны быть массивом.',
            'genres.*.exists' => 'Некоторые жанры не существуют.',
        ];
    }
}
