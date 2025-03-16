<?php

namespace App\Http\Requests\Forum;

use Illuminate\Foundation\Http\FormRequest;

class ForumPostCreateRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'max:255'],
            'content' => ['required', 'max:500']
        ];
    }
}
