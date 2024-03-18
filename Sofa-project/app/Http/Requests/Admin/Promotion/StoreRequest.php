<?php

namespace App\Http\Requests\Admin\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code'=>'required|unique:promotions,code',
            'discount'=>'required|integer|min:0|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'=>'vui lòng nhập mã khuyến mãi',
            'code.unique'=>'mã khuyến mãi này đã có . xin hãy nhập mã khuyến mãi khác ',
            'discount.required'=>'vui lòng nhập mức giảm giá',
            'discount.integer'=>'mức giảm giá phải là số nguyên',
            'discount.min'=>'mức giảm giá không thể nhỏ hơn 0',
            'discount.max'=>'mức giảm giá không thể lớn hơn 100'
        ];
    }
}
