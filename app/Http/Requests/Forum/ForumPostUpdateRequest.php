<?php

namespace App\Http\Requests\Forum;

use Illuminate\Foundation\Http\FormRequest;

class ForumPostUpdateRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:500'],
        ];
    }
}
