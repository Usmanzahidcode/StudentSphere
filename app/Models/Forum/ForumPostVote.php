<?php

namespace App\Models\Forum;

use App\Enums\Forum\ForumPostVoteType;
use Illuminate\Database\Eloquent\Model;

class ForumPostVote extends Model {
    protected $fillable = [
        'user_id',
        'forum_post_id',
        'type'
    ];

    protected function casts(): array {
        return [
            'type' => ForumPostVoteType::class
        ];
    }
}
