<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|unique:categories,name',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'required|mimes:jpg,bmp,png,jpeg'

        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'vui lòng nhập tên sản phẩm',
            'name.unique'=>'tên sản phẩm này đã có . xin hãy nhập thên sản phẩm khác ',
            'price.required'=>'vui lòng nhập giá cả sản phẩm',
            'price.numeric'=>'giá cả sản phẩm phải là số ',
            'description.required'=>'xui vui lòng mô tả sản phẩm',
            'image.mimes'=>'ảnh phải có đuôi jpg,png,bmp,jpeg'
        ];
    }
}
