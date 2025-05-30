<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'max:80', 'unique:users,email'],
            'password' => ['required', Password::min(6)->max(80)->numbers()->mixedCase(), 'confirmed'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => __('errors.register.first_name_required'),
            'first_name.string' => __('errors.register.first_name_string'),
            'first_name.max' => __('errors.register.first_name_max'),
            'first_name.regex' => __('errors.register.first_name_regex'),
            'last_name.required' => __('errors.register.last_name_required'),
            'last_name.string' => __('errors.register.last_name_string'),
            'last_name.max' => __('errors.register.last_name_max'),
            'last_name.regex' => __('errors.register.last_name_regex'),
            'email.required' => __('errors.register.email_required'),
            'email.email' => __('errors.register.email_email'),
            'email.max' => __('errors.register.email_max'),
            'email.unique' => __('errors.register.email_unique'),
            'password.required' => __('errors.register.password_required'),
            'password.min' => __('errors.register.password_min'),
            'password.max' => __('errors.register.password_max'),
            'password.numbers' => __('errors.register.password_numbers'),
            'password.mixed' => __('errors.register.password_mixed'),
            'password.confirmed' => __('errors.register.password_confirmed'),
        ];
    }
}
