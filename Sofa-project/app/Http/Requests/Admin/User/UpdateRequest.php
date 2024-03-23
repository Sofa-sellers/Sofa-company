<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required' . $this->user,
            'password' => 'required|confirmed',
            'email' => 'required' . $this->user,
            'status' => 'required',
            'level' => 'required',
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Please enter username',
            'password.required' => 'Please enter password',
            'password.confirmed' => 'Re-entered password does not match',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter as @gmail.com',
            'status.required' => 'Please enter status',
            'level.required' => 'Please enter level'
        ];
    }
}