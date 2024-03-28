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
            'value'=>'required|unique:attribute_values,value',
            'status'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'value.required'=>'Please enter the value of attribute',
            'value.unique'=>'This value already exists. Please enter/choose another value',
            'status.required'=>'Please select status',
            // 'status.integer'=>'Status value must be an integer',
        ];
    }
}
