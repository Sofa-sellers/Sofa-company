<?php

namespace App\Http\Requests\Admin\AttributeValue;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            // 'code'=>'required|max:1|unique:attribute_values,code'.$this->id,
            // 'value'=>'required|unique:attribute_values,value',
            'status'=>'required|integer'.$this->id,
        ];
    }

    public function messages(): array
    {
        return [
            // 'code.required'=>'Please enter the code of value\'s attribute',
            // 'code.max'=>'The code of value\'s attribute must have a character',
            // 'code.unique'=>'This value code already exists. Please enter another value code',
            // 'value.required'=>'Please enter the value of attribute',
            // 'value.unique'=>'This value already exists. Please enter/choose another value',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
        ];
    }
}
