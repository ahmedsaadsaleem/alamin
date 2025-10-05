<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product = $this->route('product');
        return [
            'model'         => 'required|integer',
            'serial_number' => 'required|string|unique:products,serial_number,' . $product->id,
            'purchase_date' => 'nullable|date',
            'end_warranty'  => 'nullable|date',
            'warranty'      => 'nullable|boolean'
        ];
    }
}
