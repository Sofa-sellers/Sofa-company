<?php

namespace App\Http\Requests\Admin\Attribute;

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
            'name'=>'required|unique:attributes,name',
            // 'status'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter attribute name',
            'name.unique'=>'This attribute name already exists. Please enter another'
            // 'status.required'=>'Please select status',
        ];
    }
}
