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
            'username.required' => 'vui lòng nhập tên người dùng',
            'username.unique' => 'tên người dùng này đã có. xin hãy nhập tên người dùng khác',
            'password.required' => 'xin vui lòng nhập mật khẩu',
            'password.confirmed' => 'mật khẩu nhập lại không trùng khớp',
            'email.required' => 'vui lòng nhập email',
            'email.unique' => 'email này đã có. xin hãy nhập email khác',
            'email.email' => 'vui lòng nhập dưới định dạng @gmail.com',
            'status.required' => 'vui lòng nhập trạng thái',
            'level.required' => 'vui lòng nhập cấp độ'
        ];
    }
}
