<?php

namespace App\Enums\Forum;

enum ForumPostVoteType: string {
    case UPVOTE = 'upvote';
    case DOWNVOTE = 'downvote';
}
