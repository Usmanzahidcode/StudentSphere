<?php

namespace App\Enums\Project;

enum OpportunityStatus: string
{
    case UNDER_REVIEW = 'under_review';
    case OPEN = 'open';
    case CLOSED = 'closed';
}
