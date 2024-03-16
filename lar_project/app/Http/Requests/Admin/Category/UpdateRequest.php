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
            'name'=>'required|unique:categories,name,'.$this->id
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'vui lòng nhập tên thể loại',
            'name.unique'=>'tên thể loại này đã có . xin hãy nhập thên thể loại khác '
        ];
    }
}
