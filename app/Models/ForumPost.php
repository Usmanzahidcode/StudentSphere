<?php

namespace App\Models;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForumPost extends Model {
    protected $fillable = [
        'user_id',
        'content',
    ];


    // Relations
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
