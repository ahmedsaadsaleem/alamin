<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
        $department = $this->route('department');
        return [
            'department_name' => 'required|string|min:3|max:255',
            'department_code' => 'required|alpha_num|min:3|max:50|unique:departments,department_code,' . $department->id,
            'manager'         => 'nullable|integer|exists:employees,id',
            'location'        => 'nullable|string|max:255',
            'phone_number'    => 'nullable|string|max:20'
        ];
    }
}
