<?php

namespace App\Http\Requests\Admin\Sku;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => [
                'required',
                Rule::unique('skus')->where(function ($query) {
                    return $query->where('attribute_id', $this->column2)
                                 ->where('value_id', $this->column3);
                })
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required'=>'The value is exists. Please choose another value of attribute',

        ];
    }
}
