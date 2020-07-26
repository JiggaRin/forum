<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required|min:5|max:200|unique:posts',
            'slug'         => 'max:200',
            'content_raw'  => 'required|string|min:5|max:10000',
            'category_id'  => 'required|integer|exists:categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'        => 'Введите заголовок статьи',
            'title.min'             => 'Заголовок должен быть не менее [:min] символов.',
            'title.max'             => 'Заголовок не должен привышать [:max] символов.',
            'title.unique:posts'    => 'Такой заголовок уже существует. Измените его пожалуйста.',
            'content_raw.min'       => 'Минимальная длинна статьи [:min] символов.',
            'content_raw.max'       => 'Максимальная длинна статьи [:max] символов.',
            'category_id.required'  => 'Укажите категорию статьи.',
        ];
    }
}
