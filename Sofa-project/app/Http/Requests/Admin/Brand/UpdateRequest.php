<?php

namespace App\Http\Requests\Admin\Brand;

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
            'name'=>'required'.$this->brand,
            'status'=>'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter brand name',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
        ];
    }
}
