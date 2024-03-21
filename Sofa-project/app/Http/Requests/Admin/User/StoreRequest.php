<?php

namespace App\Http\Requests\Admin\User;

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
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users,email',
            'status' => 'required',
            'level' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Please enter username',
            'username.unique' => 'This username already exists. please enter another username',
            'password.required' => 'Please enter password',
            'password.confirmed' => 'Re-entered password does not match',
            'email.required' => 'Please enter email',
            'email.unique' => 'This email already exists. please enter another email',
            'email.email' => 'Please enter as @gmail.com',
            'status.required' => 'Please enter status',
            'level.required' => 'Please enter level'
        ];
    }
}
