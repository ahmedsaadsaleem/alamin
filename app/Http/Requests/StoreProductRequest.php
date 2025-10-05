<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        // dd($this->request);
        return [
            'model'         => 'required|integer',
            'serial_number' => 'required|string|unique:products',
            'purchase_date' => 'nullable|date',
            'end_warranty'  => 'nullable|date',
            'warranty'      => 'nullable|boolean'
        ];
    }
}
