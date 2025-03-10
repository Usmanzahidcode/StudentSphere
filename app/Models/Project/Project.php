<?php

namespace App\Models\Project;

use App\Enums\Project\ProjectStatus;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model {
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'status',
    ];

    protected function casts(): array {
        return [
            'status' => ProjectStatus::class,
        ];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }


    public function opportunity(): BelongsTo {
        return $this->belongsTo(Opportunity::class);
    }

    public function members(): BelongsToMany {
        return $this->belongsToMany(User::class, 'project_members');
    }
}
