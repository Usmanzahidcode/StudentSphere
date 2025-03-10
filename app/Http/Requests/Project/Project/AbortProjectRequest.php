<?php

namespace App\Http\Requests\Project\Project;

use Illuminate\Foundation\Http\FormRequest;

class   AbortProjectRequest extends FormRequest {
    public function rules(): array {
        return [
            'project_id' => ['required', 'exists:projects,id'],
        ];
    }
}
