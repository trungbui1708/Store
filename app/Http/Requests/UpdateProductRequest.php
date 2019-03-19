<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'discount'=>'numeric',
            'warranty' => 'required',
            'brand' => 'required',
            'quantity' => 'required|numeric',
            'distribution_id' => 'required',
            'user_id' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng không được để trống',
            'name.min' => 'Tên sản phẩm không ít hơn 3 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'discount.numeric' => 'Giảm giá sản phẩm phải là số',
            'warranty.required' => 'Thời gian bảo hành không được để trống',
            'brand.required' => 'Hãng không được để trống',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.numeric' => 'Số lượng phải là số',
            'distribution_id.required' => 'Tên phân loại không được để trống',
            'user_id.required' => 'Người nhập không được để trống'
        ];
    }
}
