<?php

namespace App\Models\Project;

use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model {
    protected $fillable = [
        'user_id',
        'body',
    ];

    // Relations
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function opportunity(): BelongsTo {
        return $this->belongsTo(Opportunity::class);
    }
}
