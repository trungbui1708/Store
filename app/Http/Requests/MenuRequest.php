<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|min:3|max:30'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Loại danh mục không được để trống.',
            'name.min' => 'Loại danh mục không ít hơn 3 kí tự.',
            'name.max' => 'Loại danh mục không lớn hơn 30 ký tự'
        ];
    }
}
