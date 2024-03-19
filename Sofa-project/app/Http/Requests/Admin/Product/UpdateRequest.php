<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|unique:products,name,'.$this->id,
            'intro'=>'required',
            'description'=>'required',
            'product_image'=>'nullable|mimes:jpg,bmp,png,jpeg',
            'brand_id'=>'required|exists:brands,id',
            'isHot'=>'required|integer',
            'isNew'=>'required|integer',
            'document'=>'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'vui lòng nhập tên sản phẩm',
            'name.unique'=>'tên sản phẩm này đã có . xin hãy nhập thên sản phẩm khác ',
            'intro.required'=>'vui lòng nhập giới thiệu sản phẩm',
            'description.required'=>'xui vui lòng mô tả sản phẩm',
            'product_image.mimes'=>'ảnh phải có đuôi jpg,png,bmp,jpeg',
            'brand_id.required'=>'vui lòng chọn thương hiệu',
            'brand_id.exists'=>'thương hiệu không tồn tại',
            'isHot.required'=>'vui lòng chọn sản phẩm hot',
            'isHot.integer'=>'giá trị sản phẩm hot phải là số nguyên',
            'isNew.required'=>'vui lòng chọn sản phẩm mới',
            'isNew.integer'=>'giá trị sản phẩm mới phải là số nguyên',
            'document.required'=>'vui lòng nhập tài liệu sản phẩm'
        ];
    }
}
