<?php

namespace App\Enums\Forum;

enum ForumPostStatus: string {
    case UNDER_REVIEW = 'under_review';
    case PUBLISHED = 'published';
}
