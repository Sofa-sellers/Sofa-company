<?php

namespace App\Http\Requests\Admin\RatingComment;

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
            'product_id'=>'required|integer',
            'user_id'=>'required|integer',
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required'=>'Please enter product id',
            'product_id.integer'=>'Product id must be an integer',
            'user_id.required'=>'Please enter user id',
            'user_id.integer'=>'User id must be an integer',
            'rating.required'=>'Please enter rating',
            'rating.integer'=>'Rating must be an integer',
            'rating.min'=>'Rating must be at least 1',
            'rating.max'=>'Rating must be at most 5',
            'comment.required'=>'Please enter comment',
            'comment.string'=>'Comment must be a string'
        ];
    }
}