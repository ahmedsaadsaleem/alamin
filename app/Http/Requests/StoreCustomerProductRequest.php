<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerProductRequest extends FormRequest
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
            'branch'        => 'nullable|integer',
            'product'       => 'required|integer|unique:customer_products,product_id',
            'purchase_date' => 'nullable|date',
            'warranty'      => 'nullable|boolean',
            'end_warranty'  => 'required|date'
        ];
    }
}
