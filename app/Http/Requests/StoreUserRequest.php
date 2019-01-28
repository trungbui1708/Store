<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name|min:3|max:30',
            'username' => 'required|unique:users,username|min:3|max:30',
            'email' => 'required|unique:users,email|email',
            'address' => 'required|min:3',
            'phone' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập thông tin',
            'name.unique' => 'Họ tên đã tồn tại',
            'name.min' => 'Vui lòng nhập nhiều hơn  3 kí tự.',
            'name.max' => 'Username không lớn hơn 30 ký tự',
            'username.required' => 'Username không được để trống.',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.min' => 'Username không ít hơn 3 kí tự.',
            'username.max' => 'Username không lớn hơn 30 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không ít hơn 3 kí tự.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.min' => 'Địa chỉ không ít hơn 3 kí tự.',
        ];
    }
}
