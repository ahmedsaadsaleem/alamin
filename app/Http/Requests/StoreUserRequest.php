<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:15',
            'last_name'  => 'required|string|max:30',
            'username'   => 'required|max:30|alpha_dash|unique:users',
            'email'      => 'required|max:100|email|unique:users',
            'phone'      => 'required|max:16|unique:users',
            'group'      => 'required|integer|exists:user_groups,id',
            'password'   => 'required|max:60|confirmed',
            'password_confirmation'  => 'required',
        ];
    }
}
