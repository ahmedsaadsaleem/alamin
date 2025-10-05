<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerBranchRequest extends FormRequest
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
        $branch = $this->route('branch');
        return [
            'branch_name'   => 'required|max:60|unique:customer_branches,branch_name,' . $branch->id,
            'alamin_code'   => 'nullable|max:8',
            'address'       => 'required|max:60',
            'branch_phone'  => 'nullable|max:16',
            'branch_emp'    => 'nullable|max:30',
            'emp_phone'     => 'nullable|max:16'
        ];
    }
}
