<?php

namespace App\Models\Project;

use App\Enums\Project\ProjectStatus;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model {
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'status',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function opportunity(): BelongsTo {
        return $this->belongsTo(Opportunity::class);
    }

    public function members(): BelongsToMany {
        return $this->belongsToMany(User::class, 'project_members');
    }

    public function messages(): HasMany {
        return $this->hasMany(Message::class);
    }

    protected function casts(): array {
        return [
            'status' => ProjectStatus::class,
        ];
    }
}
