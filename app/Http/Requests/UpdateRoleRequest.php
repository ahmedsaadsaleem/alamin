<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $role = $this->route('role');
        return [
            'role_name' => 'required|string|max:30||unique:roles,role_name,' . $role->id,
            'role'      => 'required|string|max:30',
            'target'    => 'required|string|max:30',
        ];
    }
}
