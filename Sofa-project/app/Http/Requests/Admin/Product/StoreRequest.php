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
            'dimension_id' => 'required',
            'material_id' => 'required',
            'description'=>'required',
            'price'=>'nullable|numeric|min:0',
            'sale_price'=>'required|numeric|min:0',
            'quantity'=>'required|min:2|numeric',
            'file' => 'required|mimes:pdf',
            'category_id'=>'required',
            'brand_id'=>'required',
            'status'=>'required|integer',
            'value_id'=>'required',
            'images'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter product name',
            'name.unique'=>'This product name already exists. Please enter another product name',
            'image.required'=>'Please choose product image',
            'image.mimes'=>'Image must have extension jpg,png,bmp,jpeg',
            'dimension_id.required' =>'Please select product dimension',
            'material_id.required' => 'Please select product material',
            'description.required'=>'Please describe the product',
           
            'price.numeric'=>'Product original price must be a number',
            'price.min'=>'Product original price must be large than 0',
            'sale_price.required'=>'Please enter selling price',
            'sale_price.numeric'=>'Product selling price must be a number',
            'sale_price.min'=>'Product selling price must be large than 0',
            'quantity.required'=>'Please enter product quantity',
            'quantity.integer'=>'Product quantity must be an integer',
            'quantity.min'=>'Product quantity must be large than 2',
            'file.required'=>'Please select the user manual file for the product',
            'file.mimes'=>'File must have extension pdf',
            'category_id.required'=>'Please select product category',
            'brand_id.required'=>'Please select product brand',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
            'value_id.required'=>'Please select color',
            'images.required'=>'Please add more images'
        ];
    }
}
