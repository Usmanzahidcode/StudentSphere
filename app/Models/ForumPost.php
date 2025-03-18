<?php

namespace App\Models;

use App\Enums\Forum\ForumPostStatus;
use App\Enums\Forum\ForumPostVoteType;
use App\Models\Forum\ForumPostVote;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumPost extends Model {
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function voteScore() {
        return $this->upvotes()->count() - $this->downvotes()->count();
    }


    // Relations

    public function upvotes() {
        return $this->votes()->where('type', ForumPostVoteType::UPVOTE);
    }

    public function votes(): HasMany {
        return $this->hasMany(ForumPostVote::class);
    }

    public function downvotes() {
        return $this->votes()->where('type', ForumPostVoteType::DOWNVOTE);
    }

    public function userVote(User $user) {
        return $this->votes()->where('user_id', $user->id)->first();
    }

    protected function casts(): array {
        return [
            'status' => ForumPostStatus::class,
        ];
    }

}
