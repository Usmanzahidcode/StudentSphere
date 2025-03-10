<?php

namespace App\Enums\Project;

enum ProjectStatus: string
{
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case ABORTED = 'aborted';
}
