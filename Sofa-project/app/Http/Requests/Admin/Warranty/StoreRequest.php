<?php

namespace App\Http\Requests\Admin\Warranty;

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
            'order_id'=>'required|integer',
            'product_id'=>'required|integer',
            'quantity'=>'required|integer',
            'delivery_date'=>'required|date',
            'status'=>'required|integer',
            'end_day'=>'required|date'
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required'=>'Please enter order id',
            'order_id.integer'=>'Order id must be an integer',
            'product_id.required'=>'Please enter product id',
            'product_id.integer'=>'Product id must be an integer',
            'quantity.required'=>'Please enter quantity',
            'quantity.integer'=>'Quantity must be an integer',
            'delivery_date.required'=>'Please enter delivery date',
            'delivery_date.date'=>'Delivery date must be a date',
            'status.required'=>'Please enter status',
            'status.integer'=>'Status must be an integer',
            'end_day.required'=>'Please enter end day',
            'end_day.date'=>'End day must be a date'
        ];
    }
}
