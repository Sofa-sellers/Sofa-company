<?php

namespace App\Http\Requests\Admin\Category;

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
            'name'=>'required|unique:categories,name,'.$this->id,
            'photo'=>'required|mimes:jpg,bmp,png,jpeg',
            'status'=>'required|integer'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Please enter category name',
            'name.unique'=>'This category name already exists. Please enter another category',
            'photo.required'=>'Please choose category image',
            'photo.mimes'=>'Photo must have extension jpg,png,bmp,jpeg',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer'
        ];
    }
}
