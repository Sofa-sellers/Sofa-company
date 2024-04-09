<?php

namespace App\Http\Requests\Client\Order;

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
            'reason' => 'required|max_digits:200'
        ];
    }

    public function messages(): array
    {
        return [
            'reason.required' => 'Please enter reason for cancel order',
            'reason.max_digits' => "Reason only contains 200 words"
        ];
    }
}