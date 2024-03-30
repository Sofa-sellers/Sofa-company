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
            // 'value'=>'required|unique:attribute_values,value|regex:/^(?!0+$)(?:(?:(?:500|[1-9]\d{0,2})\s*x\s*){2}(?:300|[1-2]?\d{1,2}))$/',

            // 'status'=>'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            // 'value.required'=>'Please enter the value of attribute',
            // 'value.unique'=>'This value already exists. Please enter/choose another value',
            // 'value.regex'=>'Please enter 3 values "a x b x c", where a, b, c are greater than 0 and a, b are less than 500, and c is less than 300',
            // 'status.required'=>'Please select status',
            // 'status.integer'=>'Status value must be an integer',
        ];
    }
}
