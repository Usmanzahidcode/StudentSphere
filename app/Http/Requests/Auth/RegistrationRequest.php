<?php

namespace App\Http\Requests\Auth;

use App\Enums\User\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RegistrationRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'dob' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'string', new Enum(Gender::class)],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'github' => ['nullable', 'url', 'max:255'],
            'personal_site' => ['nullable', 'url', 'max:255'],
            'educational_background.institution' => ['required', 'string', 'max:255'],
            'educational_background.degree' => ['required', 'string', 'max:255'],
            'educational_background.field_of_study' => ['required', 'string', 'max:255'],
            'educational_background.year_of_study' => ['required', 'integer', 'digits:4'],
        ];

    }
}
