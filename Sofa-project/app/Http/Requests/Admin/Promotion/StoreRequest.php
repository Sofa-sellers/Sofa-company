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
            'code'=>'required|string|unique:promotions,code',
            'description'=>'required|string',
            'discount_percent'=>'required|integer|min:0|max:100',
            'date_start'=>'required|date',
            'date_end'=>'required|date|after_or_equal:date_start',
            'status'=>'required|integer|min:1|max:2'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'=>'Please enter promotion code',
            'code.string'=>'Promotion code must be a string',
            'code.unique'=>'Promotion code must be unique',
            'description.required'=>'Please enter description',
            'description.string'=>'Description must be a string',
            'discount_percent.required'=>'Please enter discount percent',
            'discount_percent.integer'=>'Discount percent must be an integer',
            'discount_percent.min'=>'Discount percent must be at least 0',
            'discount_percent.max'=>'Discount percent must be at most 100',
            'date_start.required'=>'Please enter date start',
            'date_start.date'=>'Date start must be a date',
            'date_end.required'=>'Please enter date end',
            'date_end.date'=>'Date end must be a date',
            'date_end.after_or_equal'=>'Date end must be after or equal to date start',
            'status.required'=>'Please enter status',
            'status.integer'=>'Status must be an integer',
            'status.min'=>'Status must be at least 1',
            'status.max'=>'Status must be at most 2'
        ];
    }
}
