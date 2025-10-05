<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        $employee = $this->route('employee');

        return [
            'first_name'   => 'required|string|max:50',
            'last_name'    => 'required|string|max:50',
            'email'        => 'required|email|max:100|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string|max:20',
            'alamin_code'  => 'nullable|integer|unique:employees,alamin_code,' . $employee->id,
            'hire_date'    => 'required|date',
            'job_title'    => 'nullable|string|max:100',
            'department'   => 'nullable|integer|exists:departments,id',
            'manager'      => 'nullable|integer|exists:employees,id',
            'address'      => 'nullable|string|max:255',
            'city'         => 'nullable|string|max:100',
            'state'        => 'nullable|string|max:50',
            'postal_code'  => 'nullable|string|max:50',
            'country'      => 'nullable|integer|exists:countries,id'
        ];
    }
}
