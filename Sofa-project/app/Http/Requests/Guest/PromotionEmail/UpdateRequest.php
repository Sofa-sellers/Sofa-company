<?php

namespace App\Http\Requests\Guest\PromotionEmail;

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
            'email'=>'required|email|unique:promotion_emails,email,'.$this->id,

        ];
    }
    public function messages(): array
    {
        return [
            'email.required'=>'Please enter email address',
            'email.unique'=>'This email already exists. Please enter another email address',
            'email.email'=>'Please enter your email in the format @gmail.com',
        ];
    }
}
