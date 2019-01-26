<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'username' => 'required|min:3|max:30',
            'email' => 'required|email',
            'address' => 'required|min:3',
            'phone' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập thông tin',
            'name.min' => 'Vui lòng nhập nhiều hơn  3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'username.required' => 'Username không được để trống.',
            'username.min' => 'Username không ít hơn 3 kí tự.',
            'username.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không ít hơn 3 kí tự.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.min' => 'Địa chỉ không ít hơn 3 kí tự.',
        ];
    }
}
