<?php

namespace App\Enums;

enum ForumPostVoteType: string {
    case UPVOTE = 'upvote';
    case DOWNVOTE = 'downvote';
}
