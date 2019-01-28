<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=> 'required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Không đúng định dạng email.',
            'password.required' => 'Mật khẩu không được để trống.'
        ];
    }
}
