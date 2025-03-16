<?php

namespace App\Http\Requests\Forum;

use App\Enums\ForumPostVoteType;
use Illuminate\Foundation\Http\FormRequest;

class ForumPostVoteRequest extends FormRequest {
    public function rules(): array {
        return [
            'type' => ['required', 'in:' . implode(',', array_column(ForumPostVoteType::cases(), 'value'))],
        ];
    }
}
