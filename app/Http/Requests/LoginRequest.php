<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // The max length of email and password is higher than allowed in the register validation rules for
            // future compatability as not to accidentaly temporarily lock people out of loging in if it's
            // changed in the register validation rules and not here, also because this validation rules
            // shouldn't enforce the correct format, that is the job of the register validation rules.
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'max:255'],
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
            'email.required' => __('errors.login.email_required'),
            'email.email' => __('errors.login.email_email'),
            'email.max' => __('errors.login.email_max'),
            'email.exists' => __('errors.login.email_exists'),
            'password.required' => __('errors.login.password_required'),
            'password.max' => __('errors.login.password_max'),
        ];
    }
}
