<?php

namespace App\Http\Requests\Admin\User;

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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed',
            'fullname'=>'required',
            'phone'=>'required'

        ];
    }
    public function messages(): array
    {
        return [
            'email.required'=>'vui lòng nhập email',
            'email.unique'=>'email này đã có . xin hãy nhập email khác ',
            'email.email'=>' vui lòng nhập dưới định dạng @gmail.com',
            'fullname.required'=>'vui lòng nhập giá cả sản phẩm',
            'phone.required'=>'xui vui lòng nhập số điện thoại',
            'password.required'=>'xin vui lòng nhập password',
            'password.confirmed'=>'password nhập lại không trùng khớp'
        ];
    }
}
