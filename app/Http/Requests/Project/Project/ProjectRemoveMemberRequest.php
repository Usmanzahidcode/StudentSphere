<?php

namespace App\Http\Requests\Project\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRemoveMemberRequest extends FormRequest {
    public function rules(): array {
        return [
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
