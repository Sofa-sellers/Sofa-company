<?php

namespace App\Http\Requests\Admin\DiscountCode;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|unique:promotions',
            'discount' => 'required|numeric',
        ];
    }
}

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|unique:promotions,code,' . $this->id,
            'discount' => 'required|numeric',
        ];
    }
}
