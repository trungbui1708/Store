<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'content' => 'required|min:3',
            'description' => 'required|min:3|max:500',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'title.min' => 'Tiêu đề không ít hơn 3 kí tự.',
            'title.max' => 'Tiêu đề không được quá 100 ký tự.',
            'content.required' => 'Nội Dung không được để trống.',
            'content.min' => 'Nội dung không ít hơn 3 kí tự.',
            'description.required' => 'Mô tả không được để trống.',
            'description.max' => 'Mô tả không được quá 500 ký tự để trống.',
        ];
    }
}
