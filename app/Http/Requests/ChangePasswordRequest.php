<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            'password_again' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Vui lòng không để trống',
            'password_again.same' => 'Không giống mật khẩu'
        ];
    }
}
