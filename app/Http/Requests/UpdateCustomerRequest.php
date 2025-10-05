<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        // dd($model = $this->route('customer'));
        $customer = $this->route('customer');
        return [
            'customer_name' => 'required|max:60|unique:customers,customer_name,' . $customer->id,
                // Rule::unique('customers')->ignore($customer->id)
            'main_branch'   => 'nullable|max:60',
            'address'       => 'max:100',
            'phone'         => 'max:16',
            'responsible'   => 'nullable|max:30'
        ];
    }
}
