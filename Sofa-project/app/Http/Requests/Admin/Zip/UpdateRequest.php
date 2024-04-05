<?php

namespace App\Http\Requests\Admin\Zip;

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
            'city'=>'required|unique:zips,city'.$this->zip,
            'zip'=>'required|unique:zips,zip',
            'ship_cost'=>'required|integer',
            'status'=>'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'city.required'=>'Please enter city',
            'city.unique'=>'This city already exists. Please enter another one',
            'zip.required'=>'Please enter postcode',
            'zip.unique'=>'This postcode already exists. Please enter another one',
            'ship_cost.required'=>'Please enter shipping cost',
            'ship_cost.integer'=>'Status shipping cost must be an integer',
            'status.required'=>'Please select status',
            'status.integer'=>'Status value must be an integer',
        ];
    }
}
