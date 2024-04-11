<?php

namespace App\Http\Requests\Client\Order;

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
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'city' => 'required',
            'note' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter as email structor',
            'firstname.required' => 'Please enter firstname',
            'lastname.required' => 'Please enter lastname',
            'address.required' => 'Please enter address',
            'phone.required' => 'Please enter phone',
            'phone.numeric' => 'Please enter phone only contains the number',
            'city.required' => 'Please enter city',
        ];
    }
}