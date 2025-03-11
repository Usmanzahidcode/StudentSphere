<?php

namespace App\Models\Project;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model {
    protected $fillable = ['project_id', 'user_id', 'content'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
