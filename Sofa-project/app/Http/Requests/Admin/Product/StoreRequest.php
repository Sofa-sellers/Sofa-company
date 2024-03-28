<?php

namespace App\Http\Requests\Admin\Product;

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
            'name'=>'required|unique:products,name',
            'image'=>'required|mimes:jpg,bmp,png,jpeg',
            'intro'=>'required|unique:products,intro',
            'brand_id'=>'required|exists:brands,id',
            'description'=>'required',
            'price'=>'required|numeric|min:0',
            'sale_price'=>'numeric|min:0',
            'quantity'=>'required|min:2|numeric',
            'category_id'=>'required|exists:categories,id',
            'status'=>'required|integer',
            'file' => 'required|mimes:pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter product name',
            'name.unique'=>'This product name already exists. Please enter another product name',
            'image.required'=>'Please choose product image',
            'image.mimes'=>'Image must have extension jpg,png,bmp,jpeg',
            'intro.required'=>'Please enter product introduction',
            'intro.unique'=>'This product intro already exists. Please enter another product intro',
            'description.required'=>'Please describe the product',
            'price.required'=>'Please enter product price',
            'price.numeric'=>'Product price must be a number',
            'price.min'=>'Product price must be large than 0',
            'sale_price.numeric'=>'Product sale price must be a number',
            'sale_price.min'=>'Product sale price must be large than 0',
            // 'sale_price.lt'=>'Sale price must be less than price',
            'quantity.required'=>'Please enter product quantity',
            'quantity.integer'=>'Product quantity must be an integer',
            'quantity.min'=>'Product quantity must be large than 2',
            'size.required'=>'Please choose product size image',
            'size.mimes'=>'Size image must have extension jpg,png,bmp,jpeg',
            'category_id.required'=>'Please select category',
            'category_id.exists'=>'Category does not exist',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
            'file.required'=>'Please select file',
            'file.mimes'=>'File must have extension pdf'
        ];
    }
}