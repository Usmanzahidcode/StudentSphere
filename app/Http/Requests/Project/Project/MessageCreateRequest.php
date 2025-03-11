<?php

namespace App\Http\Requests\Project\Project;

use Illuminate\Foundation\Http\FormRequest;

class MessageCreateRequest extends FormRequest {
    public function rules(): array {
        return [
            'content' => ['required', 'string', 'max:1000']
        ];
    }
}
