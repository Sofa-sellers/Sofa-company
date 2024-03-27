<?php

namespace App\Http\Requests\Admin\Sku;

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
            'image'=>'required|mimes:jpg,bmp,png,jpeg'.$this->id,
            'quantity'=>'min:2|numeric',
            // 'status'=>'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required'=>'Please choose SKU image',
            'image.mimes'=>'Image must have extension jpg,png,bmp,jpeg',
            'quantity.min'=>'Quantity must at least 2',
            'quantity.numeric'=>'Quantity must be in numeric',
            // 'status.required'=>'Please select status',
            // 'status.integer'=>'Status value must be an integer',
        ];
    }
}