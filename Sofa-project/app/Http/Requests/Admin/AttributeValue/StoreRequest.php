<?php

namespace App\Http\Requests\Admin\AttributeValue;

use Illuminate\Foundation\Http\FormRequest;

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
            'attribute_id'=>'required|integer|min:1',
            'status'=>'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'attribute_id.required'=>'Please select attribute',
            'attribute_id.min'=>'Please select attribute',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
        ];
    }
}
