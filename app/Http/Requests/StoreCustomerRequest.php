<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'bail|required|unique:customers|max:60',
            'main_branch'   => 'max:60',
            'address'       => 'max:100',
            'phone'         => 'max:16',
            'responsible'   => 'max:30'
        ];
    }
}
