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
            'image'=>'required|mimes:jpg,bmp,png,jpeg',
            'price'=>'required|numeric',
            'quantity'=>'required|integer',
            'category_id'=>'required|exists:categories,id',
            'user_id'=>'required|exists:users,id',
            'status'=>'required|integer',
            'file'=>'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter product name',
            'name.unique'=>'This product name already exists. Please enter another product name',
            'intro.required'=>'Please enter product introduction',
            'description.required'=>'Please describe the product',
            'image.mimes'=>'Image must have extension jpg,png,bmp,jpeg',
            'price.required'=>'Please enter product price',
            'price.numeric'=>'Product price must be a number',
            'quantity.required'=>'Please enter product quantity',
            'quantity.integer'=>'Product quantity must be an integer',
            'category_id.required'=>'Please select category',
            'category_id.exists'=>'Category does not exist',
            'user_id.required'=>'Please select user',
            'user_id.exists'=>'User does not exist',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
            'file.required'=>'Please enter file'
        ];
    }
}