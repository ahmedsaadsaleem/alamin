<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductModelRequest extends FormRequest
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
        $model = $this->route('model');
        return [
            'model_name'    => 'required|max:30|unique:product_models,model_name,' . $model->id,
            'category'      => 'required|integer',
            'brand'         => 'required|integer',
            'description'   => 'required|string|max:100'
        ];
    }
}
