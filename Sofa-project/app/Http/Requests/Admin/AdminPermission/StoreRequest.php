<?php

namespace App\Http\Requests\Admin\AdminPermission;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|string|unique:admin_permissions,name'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Please enter name',
            'name.string'=>'Name must be a string',
            'name.unique'=>'Name must be unique'
        ];
    }
}
