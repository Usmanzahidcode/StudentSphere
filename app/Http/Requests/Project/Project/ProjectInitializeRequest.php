<?php

namespace App\Http\Requests\Project\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectInitializeRequest extends FormRequest {
    public function rules(): array {
        return [
            'selected_applicants' => ['required', 'array', 'min:1'],
            'selected_applicants.*' => ['required', 'integer', 'exists:users,id']
        ];
    }
}
