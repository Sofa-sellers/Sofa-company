<?php

namespace App\Http\Requests\Admin\RatingComment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\RatingComment;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'id' => [
                'required',
                'integer',
                Rule::exists('rating_comments')->where(function ($query) {
                    $query->where('id', $this->id)
                          ->where('user_id', auth()->id());
                })
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Please enter product id',
            'product_id.integer' => 'Product id must be an integer',
            'user_id.required' => 'Please enter user id',
            'user_id.integer' => 'User id must be an integer',
            'rating.required' => 'Please enter rating',
            'rating.integer' => 'Rating must be an integer',
            'rating.min' => 'Rating must be at least 1',
            'rating.max' => 'Rating must be at most 5',
            'comment.required' => 'Please enter comment',
            'comment.string' => 'Comment must be a string',
            'id.required' => 'Please enter the id of the rating comment',
            'id.integer' => 'The id of the rating comment must be an integer',
            'id.exists' => 'The specified rating comment does not exist or you do not have permission to update it'
        ];
    }
}
