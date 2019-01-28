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
            'images' => 'required',
            'discount'=>'min:1|max:100|numeric',
            'thumbnail' => 'required',
            'warranty' => 'required',
            'brand' => 'required',
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
            'images.required' => 'Link ảnh không được để trống',
            'discount.min' => 'Tên sản phẩm không ít hơn 3 ký tự',
            'discount.min' => 'Tên sản phẩm không nhiều hơn 100 ký tự',
            'discount.numeric' => 'Giảm giá sản phẩm phải là số',
            'thumbnail.required' => 'Link ảnh nền ko được để trống',
            'warranty.required' => 'Thời gian bảo hành không được để trống',
            'brand.required' => 'Hãng không được để trống',
            'distribution_id.required' => 'Tên phân loại không được để trống',
            'user_id.required' => 'Người nhập không được để trống'
        ];
    }
}
